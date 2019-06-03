
<?php include('view/layout/header.php'); ?>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index.php?r=teacher/home">
              <span data-feather="file"></span>
              班级管理
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index.php?r=teacher/add_course">
              <span data-feather="file"></span>
              新增班级
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/index.php?r=teacher/studentManager">
              <span data-feather="file"></span>
              学生管理
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index.php?r=teacher/commentManager">
              <span data-feather="file"></span>
              评价管理
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index.php?r=teacher/Emails">
              <span data-feather="file"></span>
              校园邮箱
            </a>
          </li>
        </ul>
     </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <form action="/index.php?r=teacher/do_update_student" method="post" enctype="multipart/form-data">
        <h4 class="mb-3">学生信息设置</h4>

        <div class="mb-3">
          <label for="email">学号 <span class="text-muted">(student_id)</span></label>
          <label class="form-control" name ='id'><?php echo $studentId?></label>
          <input type="hidden" name="student_id" value="<?= $studentId ?>">
        </div>

        <div class="mb-3">
          <label for="email">姓名 <span class="text-muted">(student_name)</span></label>
          <input class="form-control" name="name" placeholder="<?php echo $TheStudent['student_name'] ?>">
        </div>

        <div class="mb-3">
          <label for="email">班级 <span class="text-muted">(class)</span></label>
          <input class="form-control" name="class" placeholder="<?php echo $TheStudent['class'] ?>">
        </div>

        <div class="mb-3">
          <label for="email">密码 <span class="text-muted">(password)</span></label>
          <input class="form-control" name="password" placeholder="<?php echo $UserStudent['password'] ?>">
        </div>

        <div class="mb-3">
          <label for="permit">登陆权限</label>
          <select class="custom-select d-block w-100" name="permit" required="">
            <option value="">Choose...</option>
            <option>可登陆</option>
            <option>不可登陆</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="role">角色</label>
          <select class="custom-select d-block w-100" name="role" required="">
            <option value="">Choose...</option>
            <option>student</option>
            <option>teacher</option>
          </select>
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">保存信息设置</button>
      </form>
    </main>
  </div>
</div>

<?php include('view/layout/footer.php');