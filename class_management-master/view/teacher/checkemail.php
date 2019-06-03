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
            <a class="nav-link" href="/index.php?r=teacher/studentManager">
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
            <a class="nav-link active" href="/index.php?r=teacher/Emails">
              <span data-feather="file"></span>
              校园邮箱
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <form action="/index.php?r=teacher/do_update_comment" method="post" enctype="multipart/form-data">
        <h4 class="mb-3">邮件内容</h4>
       
        <div class="mb-3">
          <label for="email">发送人ID <span class="text-muted">(flyfrom_id)</span></label>
          <label class="form-control" name ='flyfrom_id'><?php echo $email['flyfrom_id']?></label>
          <input type="hidden" name="flyfrom_id" value="<?= $email['flyfrom_id'] ?>">
        </div>

        <div class="mb-3">
          <label for="email">发送人姓名 <span class="text-muted">(flyfrom_name)</span></label>
          <label class="form-control"><?php echo $email['flyfrom_name']?></label>
        </div>

        <div class="mb-3">
          <label for="email">发送时间 <span class="text-muted">(flytime)</span></label>
          <label class="form-control"><?php echo $email['flytime']?></label>
        </div>

        <div class="mb-3">
          <label for="email">邮件内容 <span class="text-muted">(content)</span></label>
          <label class="form-control"><?php echo $email['content']?></label>
        </div>

      </form>
    </main>
  </div>
</div>

<?php include('view/layout/footer.php');