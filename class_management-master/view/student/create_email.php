
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
            <a class="nav-link" href="/index.php?r=student/home">
              <span data-feather="file"></span>
              我的班级
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index.php?r=student/comment_home">
              <span data-feather="file"></span>
              教学质量评价
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/index.php?r=student/Emails">
              <span data-feather="file"></span>
              校园邮箱
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <form action="/index.php?r=student/send_email" method="post" enctype="multipart/form-data">
        <h4 class="mb-3">邮件内容</h4>
       
        <div class="mb-3">
          <label for="email">收信人ID <span class="text-muted">(flyto_id)</span></label>
          <input class="form-control" name="flyto_id" placeholder="请输入收信人ID">
        </div>

        <div class="mb-3">
          <label for="email">邮件内容 <span class="text-muted">(content)</span></label>
          <input class="form-control" name="content" placeholder="请输入邮件内容">
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">发送邮件</button>
      </form>
    </main>
  </div>
</div>

<?php include('view/layout/footer.php');