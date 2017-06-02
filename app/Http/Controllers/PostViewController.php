<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Post;
use Response;
use Illuminate\Support\Facades\Input;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;


use paragraph1\phpFCM\Client;
use paragraph1\phpFCM\Message;
use paragraph1\phpFCM\Recipient\Device;
use paragraph1\phpFCM\Notification;




class PostViewController extends Controller
{
    protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;

    }

    public function viewPosts()
    {
        return view('posts_cadastrar')->renderSections()['conteudo'];
    }

    public function allPosts()
    {
        $post = $this->model->allPosts();

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }

        return view('posts_consultar')->with('posts', $post)->renderSections()['conteudo'];

    }

    public function getPost($id)
    {
        $post = $this->model->getPost($id);

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }

        return Response::json( $post, 200);
    }

    public function savePost(Request $request)
    {
    	$tipo = $request->input('tipo');
        $link_imagem = "";
    	if($tipo == 'imagem') {

            if($request->file('imagem')) {
                $imageName = time().'.'.$request->file('imagem')->getClientOriginalExtension();
                $request->file('imagem')->move(public_path('images/eventos'), $imageName);
                $link_imagem = '/images/eventos/'.$imageName;
            }
    	}


        $arr_ins = array(
            'nome'        => $request->nome,
            'descricao'   => $request->descricao,
            'tipo'        => $request->tipo,
            'link_imagem' => $link_imagem,
            'link'        => $request->link,
            'data'        => $request->data,
        );

        $post = $this->model->create($arr_ins);

        //** INI - Enviando PUSH **//
/*
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder();
        
        $notificationBuilder->setTitle('IBVN')
                            ->setBody('Você tem uma nova notificação')
                            // ->setClickAction('http://localhost:8081')
                            ->setSound('default');
                            
        //$dataBuilder = new PayloadDataBuilder();
        //$dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();
        
        //$data = $dataBuilder->build();

        $token = [
            "AAACIF72XU:APA91bF19GfkwL_c5TROwfYMaijMFSi0wmz7C4YO-fSs0WhXtiCupqEwVUm4esXPJJc1ChInS6zKKXXaeC5BxwYBKpgnI2l_ZbFaCeCCy92dGzw9Z5l35UQtRfeGn_MLs3lMIg7n6L29",
            "AAAACIF72XU:APA91bGV_VVbzeNFT80Dnzz6FN1p0JHOteMJhz20-vzt-lV7GZDcF47KdEwPlhwTuO56EEdKhTABosn69915pZFxRX6V9QyfwamcbffnG-D5aGEe4YU_DBhsLQEmpmeXAoLzM7IYWUS1",

        ];

        $downstreamResponse = FCM::sendTo($token, $option, $notification);
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure(); 

        $downstreamResponse->numberModification();

        //return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete(); 

        //return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify(); 

        //return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array 
        $downstreamResponse->tokensWithError(); 
*/
        //** FIM - Enviando PUSH **//

        // require_once 'vendor/autoload.php';

      /*  $apiKey = "AAAACIF72XU:APA91bHwk9L7fAEtcthLzuc4XznnRCoD_eePUdcY6fEepk1qtYiqnCO5ebhNdqRhzUFC64KRaqCVcW-xtfViILPMx-rWZ5CtXF4MPqsO8DBMQU_jTcQ4xQj8TOP7LyaOrdBpWbMvpxmU";
        $client = new Client();
        $client->setApiKey($apiKey);
        $client->injectHttpClient(new \GuzzleHttp\Client());

        $note = new Notification('test title', 'testing body');
        $note->setIcon('notification_icon_resource_name')
            ->setColor('#ffffff')
            ->setBadge(1);

        $message = new Message();
        $message->addRecipient(new Device("AAAACIF72XU:APA91bHwk9L7fAEtcthLzuc4XznnRCoD_eePUdcY6fEepk1qtYiqnCO5ebhNdqRhzUFC64KRaqCVcW-xtfViILPMx-rWZ5CtXF4MPqsO8DBMQU_jTcQ4xQj8TOP7LyaOrdBpWbMvpxmU"));
        $message->setNotification($note)
            ->setData(array('someId' => 111));

        $response = $client->send($message);
        dd($response->getStatusCode());
  */
        return view('posts_consultar')->with('posts', Post::all()); 
    	
      //  return view('posts_cadastrar')->with('post', $post);
    }

    public function alterarPosts($id)
    {
        return view('posts_cadastrar')->with('post', Post::find($id))->renderSections()['conteudo'];
    }

    public function updatePost($id , Request $request)
    {
        $input = $request->all();

        $post = $this->model->updatePost($id, $input);

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }

        return view('posts_consultar')->with('posts', Post::all()); 
    }

    public function deletePost($id)
    {
        $this->model->deletePost($id);

        
        return view('posts_consultar')->with('posts', Post::all())->renderSections()['conteudo'];
        
    }
}
