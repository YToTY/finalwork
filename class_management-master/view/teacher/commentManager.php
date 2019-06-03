
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
            <a class="nav-link active" href="/index.php?r=teacher/commentManager">
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
      
      <h2>我获得的评价</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>学生学号</th>
              <th>学生姓名</th>
              <th>学生评价</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($comments as $value): ?>
            <tr>
              <td><?php echo $rowNum;?></td>
              <td><?php echo $value['student_id'];?></td>
              <td><?php echo $value['student_name'];?></td>
              <td><?php echo $value['content'];?></td>
              <td><a href="/index.php?r=teacher/deletecomment&comment_id=<?php echo $value['id'];?>">删除评价</a></td>
            </tr>
            <?php $rowNum += 1;endforeach; ?>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include('view/layout/footer.php');