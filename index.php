<?php 
include './inc/db.php' ;
include './inc/form.php';

$sql    = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn,$sql) ;
$users  = mysqli_fetch_all($result,MYSQLI_ASSOC); 

mysqli_free_result($result);
mysqli_close($conn);
?>


<?php include './parts/header.php' ?>

<div class="container">  

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 fw-normal">إربح مع نور</h1>
    <p class="lead fw-normal">باقي علي فتح التسجيل <br>. للسحب للربح نسخة مجانية من برنامج</p>
    <h3 id="demo"></h3>
    </div>
</div>

<h3 class="text-center"> للدخول في السحب إتبع مايلي
:   </h3>
<br>
<div class="container">  

    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item">تابع البث المباشر علي صفحتي علي فايسبوك التاريخ مذكور أعلاه</li>
        <li class="list-group-item">سأقوم ببث مباشر لمدة الساعة و أجيب علي جميع الأسئلة </li>
        <li class="list-group-item">خلال هذه الفترة ستفتح عملية التسجيل</li>
        <li class="list-group-item">بنهاية بث سيتم إختيار إسم واحد عشوائيا</li>
        <li class="list-group-item">الرابع سيحصل علي نسخة مجانية من برناج كامتازيا </li>
    </ul>
</div>
</div>
</div>


<div class="container">  

<div class="position-relative text-right bg-light"> 
<div class="col-md-5 p-lg-5 mx-auto my-3">

<form  action="index.php" method="POST">
    <h3> الرجاء أدخل معلوماتك </h3>

    <div class="mb-3">

        <label for="firstName" class="form-label">الإسم الأول</label>
        <input type="text" name="firstName" class="form-control" id="firstName" required  oninvalid="this.setCustomValidity('يرجي إدخال الإسم الأول')" oninput="setCustomValidity('')" >
        <div  class="form-text error"><?php echo $errors["firstNameEroor"]   ?>  </div>
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label">الإسم الأخير</label>
        <input type="text" name="lastName" class="form-control" id="lastName" required   oninvalid="this.setCustomValidity('يرجي إدخال الإسم الثاني')" oninput="setCustomValidity('')" >
        <div  class="form-text error"> <?php echo $errors["lastNameEroor"]   ?>  </div>
    </div>

    <div class="mb-3">
        <label for="Email" class="form-label">البريد الإلكتروني</label>
        <input type="text" name="email" class="form-control" id="Email" required  oninvalid="this.setCustomValidity('يرجي إدخال البريد الإلكتروني كاملا و صحيح ')" oninput="setCustomValidity('')" >
        <div  class="form-text error"> <?php echo $errors["EmailEroor"]   ?>   </div>
    </div>
    <button type="submit"  name="submit" class="btn btn-primary">إرسال المعلومات </button>
</form>
</div>
</div>

<div class="loader-con"> 
    <div id="loader" >
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>

<div class="d-grid gap-2 col-6 mx-auto my-5">
    <button id="winner" class="btn btn-primary" >إختيار الرابح </button> 
</div>

<div class = "container">
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
        <div class="modal-header">
        <?php foreach($users as $user): ?>
        <h7 class="modal-title" id="modalLabel"> : الرابح في المسابقة </h7>
        <?php endforeach; ?>
        </div>
        <div class="modal-body">
        <h4> <?php     echo  $user['firstName']    ; ?>      
        <?php     echo  $user['lastName']    ; ?> </h4>       
        </div>
        <div class="modal-footer">

            <button id="close" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>   
        </div>
        </div>
    </div>
</div>

</div>



<?php include './parts/footer.php' ?>
