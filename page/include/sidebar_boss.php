<script>
        function logout() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        Swal.fire({
        title: 'ออกจากระบบ?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title:'ออกจากระบบ สำเร็จ!',
            icon: 'success'
            // 'Your file has been deleted.',
            
            }).then((result) => {
                window.location="../../logout.php";
            })
        }
        })
        }

       
    </script>
<body class="sidebar-mani layout-fixed sidebar-closed sidebar-collapse " style="height: auto;">
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
    <img src="../../assets/images/favicons/logo.png" alt="AdminLTE Logo" class="brand-image " style="">
      <span class="brand-text font-weight-light">OPRS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden"> -->
      
      <!-- <div class="os-padding"> -->
        <!-- <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"> -->
          <!-- <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;"> -->
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <!-- <div class="image"> -->
              <?php
                //   $sql = "SELECT img FROM member WHERE member_id = '".$_SESSION["member_id"]."'";
                //   $query0 = mysqli_query($condb, $sql);
                //   $rows0 = mysqli_fetch_array($query0, MYSQLI_ASSOC);
                ?>
              <!-- <img src="../../assets/images/<?php //echo $rows0['img'] ?>" class="img-circle elevation-2" alt="User Image"> -->
              <!-- </div> -->
              <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION["member_name"] ?></a>
                <span style="color: white;">(<?php echo  $_SESSION["department_name"] ;?>)</span>

              </div>
            </div>

            <!-- SidebarSearch Form -->
            <!-- <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                </div>
              </div>
              <div class="sidebar-search-results">
                <div class="list-group"><a href="#" class="list-group-item">
                    <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div>
                    <div class="search-path"></div>
                  </a></div>
              </div>
            </div> -->
            <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>
                                            ข้อมูลปฎิบัติงานพนักงาน
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                

                                <!-- <li class="nav-item">
                                    <a href="feedback.php" class="nav-link">
                                    <i class="nav-icon fas  fa-comment"></i>
                                        <p>
                                            feedback
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="history_feedback.php" class="nav-link">
                                    <i class="nav-icon fas fad fa-history"></i>

                                        <p>
                                        ประวัติส่งข้อเสนอแนะ            
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="summary.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                       
                                        <p>
                                        สรุปผลการรายงานของพนักงาน
                                            <!-- <i class="right fas fa-angle-left"></i> -->
                                        </p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="estimate.php" class="nav-link">
                                    <i class="nav-icon fas fal fa-table"></i>
<p>
                                            ประเมินผล
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="edit_profile.php" class="nav-link">
                                    <i class="nav-icon far fas fa-edit"></i>

                                        <p>
                                            แก้ไขข้อมูลส่วนตัว           
                                        </p>
                                    </a>
                                </li> -->

                                <li class="nav-item">
                                <a class="nav-link" onclick="logout()">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>ออกจากระบบ</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 48.933%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
    </aside>

</body>