<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
      <title></title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
@import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
*{ margin: 0; padding: 0;}
*, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

body{
  min-height: 100vh;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  align-content: flex-start;
    
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 300;
  font-smoothing: antialiased;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
  font-size: 15px;
  background: #eee;
}
.cd__intro{
   padding: 60px 30px;
   margin-bottom: 15px;
        flex-direction: column;

}
.cd__intro,
.cd__credit{
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    background: #fff;
    color: #333;
    line-height: 1.5;
    text-align: center;
}

.cd__intro h1 {
   font-size: 18pt;
   padding-bottom: 15px;

}
.cd__intro p{
   font-size: 14px;
}

.cd__action{
   text-align: center;
   display: block;
   margin-top: 20px;
}

.cd__action a.cd__btn {
  text-decoration: none;
  color: #666;
   border: 2px solid #666;
   padding: 10px 15px;
   display: inline-block;
   margin-left: 5px;
}
.cd__action a.cd__btn:hover{
   background: #666;
   color: #fff;
    transition: .3s;
-webkit-transition: .3s;
}
.cd__action .cd__btn:before{
  font-family: FontAwesome;
  font-weight: normal;
  margin-right: 10px;
}
.down:before{content: "\f019"}
.back:before{content:"\f112"}

.cd__credit{
    padding: 12px;
    font-size: 9pt;
    margin-top: 40px;

}
.cd__credit span:before{
   font-family: FontAwesome;
   color: #e41b17;
   content: "\f004";


}
.cd__credit a{
   color: #333;
   text-decoration: none;
}
.cd__credit a:hover{
   color: #1DBF73; 
}
.cd__credit a:hover:after{
    font-family: FontAwesome;
    content: "\f08e";
    font-size: 9pt;
    position: absolute;
    margin: 3px;
}
.cd__main{
  background: #fff;
  padding: 20px;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  
}
.cd__main{
    display: flex;
    width: 100%;
}

@media only screen and (min-width: 1360px){
    .cd__main{
      max-width: 1280px;
      margin-left: auto;
      margin-right: auto; 
      padding: 24px;
    }
}
.cd__main{
  background: linear-gradient(to right, #e0eafc, #cfdef3) !important;
  min-height: 720px;
  align-items: center
}
    </style>
    </head>
   <body>

      <main class="cd__main">
  
         <div class="jumbotron text-center">
  <h1 class="display-3">Cảm ơn bạn đã mua hàng!</h1>
  <p class="lead"><strong>Vui lòng check email</strong> để kiểm tra đơn hàng của bạn.</p>
  <hr>
  <p>
    Having trouble? <a href="#">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{ route('show_index') }}" role="button">Tiếp tục mua hàng</a>
  </p>
</div>
     
      </main>
     
  
   </body>
</html>