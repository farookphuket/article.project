<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel7 multiple roles user login project - farook's style</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        <link rel="stylesheet" href="{{asset('css/custom_theme.css')}}">
        
    </head>
    <body>
        <div class="flex-center position-ref ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title mb-4" style="padding-top:25px;">
                    Landing page!
                </div>
                <p>
                    to edit this page go to 'resources/view/welcome.blade.php'.
                </p>
                
               <p class="pt-4" style="color:red;font-size:28px;font-weight:bold;">
                   เรียนลาราเวล7 ในแบบ "ลุงฟา" ตอน Login แบบ หลายๆ ระดับ<br /> 
               </p> 
               <p class="pt-4" style="font-size:20px;color:green;font-weight:bold;">
               วันนี้คือวันที่-เดือน-ปี  {{date('d-m-Y')}} เวลา am/pm {{date('H:i a')}} เชคดูว่าเวลาของท่านในหน้าจอนี้กับเวลาในเครื่องตรงกันหรือไม่ ถ้ามันไม่ตรงก็เข้าไปดูในไฟล์ "config/app.php" หาบรรทัดที่ 70 ที่เขียนว่า 
    {'timezone' => 'Asia/Bangkok'} ต้องเป็นแบบนี้ถ้าไม่ใช่ก็เปลี่ยนซะ เวลาจะของเราจะได้ตรงกัน
               </p>
               
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <h2 class="text-center">
                        login with multiple roles user project
                    </h2>
                    <p class="pt-3">
                        this project is to show login user with a multiple roles of user such as "admin","moderate","generic user" or "member" so call in this project
                    </p>
                    <p class="pt-2 text-center">
                        today is {{date('Y-m-d H:i:s')}} check if your time is match with your current time zone if it not you can just simply change this from the config file that live in "config/app.php" look for the line 'timezone' => 'change it to your time zone',
                    </p>

                    <p class="pt-3">if you want to try out this system now just get login by using the user account below.</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <p class="pt-2">
                                to login as "Admin" <span class="alert alert-info">admin@test.com</span> the password is <span class="alert alert-info">password</span>
                            </p>
                        
                        </li>
                        <li class="list-group-item">
                            
                            <p class="pt-2">
                                to login as "Moderate" <span class="alert alert-info">mod@test.com</span> the password is <span class="alert alert-info">password</span>
                            </p>
                        </li>
                        <li class="list-group-item">

                            <p class="pt-2">
                                to login as "Generic User" <span class="alert alert-info">test@test.com</span> the password is <span class="alert alert-info">password</span>
                            </p>
                        </li>
                    </ul>
                   <p class="pt-2">
                    or to create your own account by click "register" link.
                   </p>
                </div>
               <div class="col-lg-12 pt-6">
                    <h1 class="text-center pt-6">ถุย! ชีวิต...</h1>
                    
               </div>
               
                <div class="col-lg-4">
                    <a href="https://i.ibb.co/cb7ft8p/th-lang.png" target="_blank">
                    <img src="https://i.ibb.co/cb7ft8p/th-lang.png" class="responsive">
                    </a>
                </div>
                <div class="col-lg-8">
                    <h2 class="text-center">
                        นี่หรือคือภาษาไทยของคนยุคใหม่
                    </h2>
                    <p style="color:red;font-weight:bold;font-size:28px;">
<b>ก็ถ้า</b> ภาษาไทยมันจะสำคัญจริงๆ เวลา พูด อ่าน เขียน กัน ก็พูดกันให้ถูกสิ สมัยนี้ไม่ว่าจะดูหนัง ดูข่าว ดูยูทูป
ได้ยินแล้ว "เพลียใจ คนไทยหรือเปล่าครับ"     

                    </p>
                   <p class="pt-3">
                       หรือมันเป็นภาษาไทยของ "คนรุ่นใหม่วัยมัน" ที่เราต้องพูดให้ "กระแดะ ดัดจริต"
                        เข้าไว้ ทุกวันนี้ทำไมคนไทยถึงพูด อ่าน เขียน ภาษาไทยกันผิดๆ แต่เสือกภูมิใจเอามานำเสนอ
                        ให้เด็กๆ รุ่นหลังได้ศึกษา ได้เอามาเป็นแบบอย่าง
                        กันดีเหลือเกิน ไม่ว่าจะเป็นนักข่าว นักการเมือง นักเรียน ครู (อ้าว ก็แม่พิมพ์มันเบี้ยวนี่เนอะ)
                        หรือคนรอบๆ ตัวคุณมึง หรือแม้แต่ตัว มึงด้วยหรือเปล่า ด้วยเหตุนี้
                        เราเลยต้องตามเค้ากันเข้าไว้ เพื่อไม่ให้ตัวเอง "ตกยุค" กันสินะ เอ้า
                        งั้นเรามาลองร้องเพลงชาติในแบบภาษาไทยของคนรุ่นใหม่กันดูมั้ย เอาสักท่อนพอ </p>
                   <p>
                       "<span class="alert alert-danger">
                           ประเทศไทย ลวมเลือดเนื้อ ชาติเชื้อไทย เป็นประชา...หลัด 
                        </span>"
                   </p>

                   <p>
                       "<span class="alert alert-danger">
                           อยู่ดำลง คงไว้....
                        </span>"
                   </p>
                   <p>
                    <span class="alert alert-danger">
                       ...ด้วยไทยล้วนหมาย ลักสามัค...คี ไทยนี้ลักสงบ แต่ถึงลบไม่ขลาด
                    </span>" 
                   </p>

                   <p>
                       เห็นมั้ยครับว่าภาษาไทยของคนยุค facebook tiktok มันร้องเพลงชาติได้ ไพเราะ เพราะพริ้ง ดีแค่ไหน อย่าคิดไปเรียนภาษาอื่นเลยครับ ก็ขนาดภาษาของ พ่อ แม่ เราเองเรายังหาเรียนที่ถูกต้องไม่ได้ ภาษาอื่นๆ ก็ไม่ต้องไปเรียนให้เสียค่าโง่หรอก "อายหมา" ครับ 
                   </p>
                   <p>อย่าไปบ่นให้ใครฟังว่า "ทำไมเมือง...รถติดชิบหาย" อยากรู้มั้ยว่าทำไมรถติด 
ลองแหงนมองกระจกสิ เออ นั่นแหละตัวการทำให้รถติด อย่าไปโทษคนอื่น เพราะคนอื่นๆ ก็คิดเหมือนมึงนั่นแหละ
ทุกๆ อย่างเริ่มที่ตัวเรา ถ้าเราเองไม่คิดจะทำ แล้วจะรอให้ "หมาตัวไหน" มาทำให้เราล่ะ
                    </p>
                   
                  <div class="float-right">
                      <a class="btn btn-primary" target="_blank" href="https://www.see-southern.com/ustd/view/56">
                          อย่าคลิก!
                      </a>
                  </div>
                  

                </div>
                <div class="col-lg-12">
                    <p class="pt-4">
&nbsp;
                    </p>
                </div>
                
                <div class="col-lg-4">

                    <img src="https://i.ibb.co/mXFSV77/far-forgive.gif" class="responsive">
                </div>
                <div class="col-lg-8">
                    <h1 class="text-center">
                อย่าไปใกล้มันหนา เดี๋ยวไอ้ฟามันกัดเอา!
                    </h1>
                    

                </div>

                <div class="col-lg-12">
                    {{phpinfo()}}
                </div>
                
                
            </div>
                    
                   

        </div>
        
    </body>
</html>
