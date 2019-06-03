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
      
      <h2>我的邮箱</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>发件人ID</th>
              <th>发件人姓名</th>
              <th>发件人时间</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($emails as $value): ?>
            <tr>
              <td><?php echo $rowNum;?></td>
              <td><?php echo $value['flyfrom_id'];?></td>
              <td><?php echo $value['flyfrom_name'];?></td>
              <td><?php echo $value['flytime'];?></td>
              <td><a href="/index.php?r=teacher/checkemail&email_id=<?php echo $value['id'];?>">查看邮件</a></td>
              <td><a href="/index.php?r=teacher/delete_email&email_id=<?php echo $value['id'];?>">删除邮件</a></td>
            </tr>
            <?php $rowNum += 1; endforeach; ?>
          </tbody>
        </table>
        <p><a class="btn btn-lg btn-primary" role="button" href="/index.php?r=teacher/create_email">新建邮件</a></p>
      </div>
    </main>
  </div>
</div>

<?php include('view/layout/footer.php');