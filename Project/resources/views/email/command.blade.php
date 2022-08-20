
 <!doctype html>
 <html>
 <head>
     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
 <style>
 *{
     margin: 0;
     padding: 0;
     box-sizing: border-box;
 }
 body{font-family: Arial, Helvetica, sans-serif;padding: 20px;width: 100%;}
 .header{
     width: 100%; 
     padding: 20px;  
 }
 .txt_title{
     width: 100%;
     align-items: center;
     text-align: center;
     margin-bottom: 25px;
 }
 .txt_title h1{
     font-size: 55px;
     color: rgb(39, 135, 196);
 }
  .img{
      width: 100%;
     margin-bottom: 5px;
     align-items: center;
     text-align: center;
 }
 .mail_custom .header .txt_title h1{
     margin-top: 25px;
     font-size: 30px;
     color: rgb(53, 51, 51);
 }
 .img img{
     width: 100px;
     height: 100px;
     margin-bottom: 10px;
     height: 125px;
     text-align: center;
 }
 .body{
     background-color: white;
     padding: 5px;
     padding-left: 25px;
     padding-right: 25px;
     margin-bottom: 5px;
 }
 .body h1{
     color: rgb(26, 25, 25);
     font-weight: 500;
     font-size: 16.5px;
     margin-bottom: 15px;
     text-transform: capitalize;
 }
 .body p{
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 16px;
     margin-bottom: 15px;
 }
 
 .footer .social{
     text-align: center;
     align-items: center;
     width: 100%;
     margin-bottom: 5px;
     margin-left: 20px;
     justify-content: center;
 }
 .rights{
     width: 100%;
     margin-top: 15px;
     margin-bottom: 15px;
     text-align: center;
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 17.5px;
 }
 .rights p{
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 17.5px;
 }
 .footer .social img{
     width: 25px;
     height: 25px;
     margin-right: 30px;
     cursor: pointer;
 }
 .notifmail{
     text-align: center;
 }
 .notifmail p{
   
     margin-bottom: 8px;
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 16px;
 }
 .notifmail a{
     font-weight: 500;
     font-size: 16px;
     cursor: pointer;
     color: red;
 }
 .contact p{
     color: rgb(107, 104, 104);
 }
 .txt_title span{
     color: rgb(31, 47, 63);
 }
 a{
     cursor: pointer;

 }
 </style>
 </head>
 <body>
     <div class='img'>
     <center>
      <h1></h1>
    </center>
     </div>
     <div class='txt_title'>
         <h1 style='text-align: center;'>SIIM<span>LAA</span> </h1>
     </div>
     <div class='body'>
         <h1>Notification</h1>
         <p>Vous avez recu une commande de {{$commandInfo['title']}} <strong>{{$commandInfo['command_name']}}</strong> de part du client <strong>{{$commandInfo['name']}}</strong> .. </p>

        <P>Veuillez contacter le client a l'une des adresses suivantes :</P>
         <div class='contact' style='margin-top: 18px;'>
             <p>Email : <span>{{$commandInfo['email']}}</span></p>
             <p>Contact : <span>{{$commandInfo['phone']}}</span></p>
         </div>
         <p style='text-align: right;'>@copyright 2022</p>
     </div>
 <div class='footer'>
     <center>
     <div class='social'>
         <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/600px-Instagram_icon.png' alt=''>
         <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Facebook-icon-1.png/600px-Facebook-icon-1.png' alt=''>
     </div>
    </center>
 </div>
 <div class='rights' style='text-align: center;'>
     <p style='text-align: center;'>Tout droit reservé à SIIMLAA</p>
  </div><br>
 </body>
 </html>
