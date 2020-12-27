<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="{{ asset('normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('basic.css') }}" rel="stylesheet">
    <link href="{{ asset('dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <title>TOYOTA</title>
</head>

<body>
    <header id="header">
        <div class="red-bar mobile-only"></div>
        <ul>
            <img class="hamburger mobile-only" src="{{asset('assets/images/hamburger.png')}}"/>
            <img src="{{ asset('assets/images/mobile-logo.png')}}" alt="logo" class="logo mobile-only">
            <div class="wrapper">
                <img class="close-popup mobile-only" src="{{asset('assets/images/close-icon.png')}}"/>
                <li class="menu-item active" data-element="info"><a href="javascript:void(0)">התחרות</a></li>
                <li class="menu-item" data-element="form"><a href="javascript:void(0)">השתתפות</a></li>
                <li class="menu-item" data-element="gallery"><a href="javascript:void(0)">גלריה</a></li>
            </div>
        </ul>
        <img src="{{ asset('assets/images/logo.png')}}" alt="logo" class="logo desktop-only">
        <div class="clear"></div>
    </header>
    <div class="section" id="info">
        <img src="{{ asset('assets/images/first-short.png')}}" class="cover desktop-only">
        <div class="section-content">

            <h1 class="desktop-only">חולמים על לנד קרוזר<br>חדש? <span class="red">קבלו אותו<br>ישר לסלון שלכם!</span></h1>
            <h1 class="mobile-only">חולמים על<br>לנד קרוזר חדש?<br><span class="red">קבלו אותו ישר<br>לסלון שלכם!</span></h1>
            <h2 class="desktop-only">השתתפו במשחק ואולי תזכו<br>בלנד קרוזר חלומי לסופ"ש כולל<br>דלק וטיול שטח מודרך</h2>
            <h2 class="mobile-only">השתתפו בחוויית AR מדהימה ואולי<br>תזכו בלנד קרוזר חלומי לסופ"ש<br>כולל דלק וטיול שטח מודרך</h2>
            <img src="{{ asset('assets/images/mobile-car-logo.png')}}" class="car-logo mobile-only"/>
            <div class="instructions">
                <p class="mobile-only sub-title">?איך משתתפים</p>
                <div class="arrow mobile-only"><img src="{{ asset('assets/images/mobile-arrow.png')}}"/></div>
                <div class="box">
                    <p class="title desktop-only"><span class="red">שלב 1 :</span>הורידו את האפליקציה</p>
                    <p class="title mobile-only">שלב 1 :הורידו את האפליקציה</p>
                    <div class="content desktop-only">"לנד קרוזר 5 יבשות", אפליקציית משחק<br>ה- AR (מציאות רבודה) של טויוטה</div>
                    <div class="content mobile-only">"לנד קרוזר 5 יבשות", אפליקציית ה- AR<br>(מציאות רבודה) של טויוטה</div>
                    <div class="link-wrapper">
                        <a href="#iphone" class="link"> <img src="{{ asset('assets/images/ios.jpg')}}"/></a>
                        <a href="#android" class="link"> <img src="{{ asset('assets/images/android.jpg')}}"/></a>
                    </div>
                </div>
                <div class="arrow desktop-only"><img src="{{ asset('assets/images/arrow-left.png')}}" /></div>
                <div class="arrow mobile-only"><img src="{{ asset('assets/images/mobile-arrow.png')}}"/></div>
                <div class="box">
                    <p class="title"><span class="red">שלב 2 :</span>שחקו וצלמו</p>
                    <div class="content desktop-only">קחו את הלנד קרוזר לנסיעה בלתי<br>נשכחת וצלמו תמונה יצירתית<br>שמשלבת את המציאות הרבודה<br>עם המציאות האמיתית</div>
                    <div class="content mobile-only">קחו את הלנד קרוזר לנסיעה בלתי נשכחת<br>וצלמו תמונה יצירתית שמשלבת את המציאות<br>הרבודה עם המציאות האמיתית</div>
                </div>
                <div class="arrow desktop-only"><img src="{{ asset('assets/images/arrow-left.png')}}" /></div>
                <div class="arrow mobile-only"><img src="{{ asset('assets/images/mobile-arrow.png')}}"/></div>
                <div class="box">
                    <p class="title"><span class="red">שלב 3 :</span>העלו תמונה</p>
                    <div class="content desktop-only">העלו את התמונה לאתר ואולי<br>תזכו בלנד קרוזר לסופ"ש<br>כולל דלק וטיול שטח מודרך</div>
                    <div class="content mobile-only">העלו את התמונה לאתר ואולי תזכו בלנד קרוזר<br>לסופ"ש כולל דלק וטיול שטח מודרך</div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="form">
        <img src="{{ asset('assets/images/two.jpg')}}" class="cover desktop-only">
        <div class="section-content">
            <!-- <div class="car-logo"></div> -->
            <img class="car-logo" src="{{asset('./assets/images/car-logo.png')}}"/>
            <div class="title">צרו את התמונה הכי<br>מעניינת ויצירתית<br>שלכם מתוך המשחק<br>והעלו לגלריה שלנו </div>
            <!-- <div class="title mobile-only">צרו את התמונה הכי<br>מעניינת ויצירתית<br>שלכם מתוך המשחק</div> -->

            <form id="upload" class="upload-form" enctype="multipart/form-data" method="post">
                @csrf
                <div class="preview desktop-only"></div>
                <label for="file-upload" class="custom-file-upload desktop-only">או העלו קובץ</label>
                <label for="file-upload" class="custom-file-upload mobile-only"><img src="{{ asset('assets/images/mobile-upload.png')}}"/>העלו קובץ לגלריה > </label>
                <input type="file" id="file-upload" name="file" accept="image/*">
                <p class="error_message" id="img_error"></p>
            </form>

            <div class="lead-wrapper">
                <p class="form-text desktop-only">עכשיו נשאר רק למלא את<br>הפרטים כדי שנוכל לחזור<br>אליכם במקרה וזכיתם:</p>
                <p class="form-text mobile-only">עכשיו נשאר רק למלא את<br>הפרטים כדי שנוכל לחזור אליכם<br>במקרה וזכיתם</p>
                <form id="lead-form" class="lead-form" action="<?=route('createLead');?>" autocomplete="off">
                    <input type="text" class="input" name="first_name" id="first_name" placeholder="שם פרטי">
                    <p class="error_message" id="first_name_error"></p>
                    <input type="text" class="input" name="last_name" id="last_name" placeholder="שם משפחה">
                    <p class="error_message" id="last_name_error"></p>
                    <input type="text" class="input" name="phone" id="phone" pattern="/^05\d\d{7}$/"
                        placeholder="טלפון">
                    <p class="error_message" id="phone_error"></p>
                    <input type="text" class="input" name="email" id="email" placeholder="דואר אלקטרוני">
                    <p class="error_message" id="email_error"></p>
                    <input type="hidden" name="img" id="img">
                    <div class="approve-wrapper">
                        <input type="checkbox" class="checkbox" id="approve" name="approve">
                        <label for="approve" class="custom-approve">אני מאשר/ת את תקנון הפעילות.<br>התחרות תסתיים ב-
                        28/2/21</label>
                    </div>
                    <p class="error_message" id="approve_error"></p>
                    <input type="button" class="submit desktop-only" value="שליחה >">
                    <input type="button" class="submit mobile-only" value="שלח/י >">
                    <div class="success_overlay">הנתונים התקבלו בהצלחה</div>
                </form>
            </div>
        </div>
    </div>
    <div class="section" id="gallery">
        <p class="title mobile-only">גלריית התמונות "לנד קרוזר 5 יבשות"<br> כבר העלתם את התמונה שלכם?</p>
        <img src="{{ asset('assets/images/three.jpg')}}" class="cover desktop-only">
        <div class="section-content">
            <div class="navigation-wrapper" dir="rtl">
                <div id="keen-slider" class="keen-slider"></div>
                <img src="{{ asset('assets/images/arrow-left.png')}}" id="arrow-left" class="arrow arrow--left">
                <img src="{{ asset('assets/images/arrow-right.png')}}" id="arrow-right" class="arrow arrow--right">
            </div>
        </div>
    </div>
    <div class="blue-bar"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser-polyfill.min.js"></script>
    <script src="{{ asset('dropzone.js') }}"></script>
    <script src="{{ asset('srcipt.js') }}"></script>
    <!-- <form action="<?=route('uploadImage');?>" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file" accept="image/*" />
        <input type="submit" value="Send" />
    </form>
    <form action="<?=route('createLead');?>" method="post">
        @csrf
{{--        <input type="file" name="file" id="file" accept="image/*" />--}}
        <input type="text" name="first_name" value="בן-אל" />
        <input type="text" name="last_name" value="בוחבוט" />
        <input type="text" name="phone" value="0525450652">
        <input type="text" name="email" value="ben-el@web-tech.co.il" />
        <input type="text" name="img" value="http://localhost/toyota/public/uploads/04a031f36e.png" />
        <input type="submit" value="Send" />
    </form> -->


    <!-- <form action="<?=route('getImages');?>" method="post">
        @csrf
        <input type="text" name="page" value="2">
        <input type="submit" value="Send1">
    </form> -->
</body>

</html>