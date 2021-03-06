<?php session_start(); ?> 
<?php include("../service/check_login_page.php"); ?>
<?php require_once("../service/condb.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OPRS SYSTEM</title>
    <!-- Section Meta tag -->
    <?php include('../include/meta.php') ?>

    <?php include("../include/head.php"); ?>
    <style>
        .contain {
            padding: 25px;
        }

        .card-title {
            font-size: 20px;
        }

        a {
            color: white;
        }

        .card-header {
            background: #004385;
            color: white;
        }

        table {
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include("nav.php"); ?>

        <?php include("../include/sidebar_staff.php"); ?>
        <?php include('../include/function_date.php');?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="card">
                    <div class="card-header ">
                        <div>
                            <h3 class="card-title">ประวัติการส่งข้อเสนอแนะ</h3>
                        </div>
                        <!-- <div style="text-align: right;">
                            <button type="button" class="btn btn-success text-right "><a href="form_report.php"><span class="fas fa-plus-circle"></span> เพิ่มรายงาน</a></button>
                        </div> -->
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>ส่งถึง</th>
                                    <th>แผนก</th>
                                    <th>หัวข้อ</th>
                                    <th>ดู</th>
                                    <!-- <th>ลบ</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                               
                                // $result = $conn->prepare("SELECT * FROM department");
                                // $result->execute(); //
                                // $row = $result->fetch(PDO::FETCH_BOTH);
                                // !!!!!!!!!!! กำหนดค่า session
                                // $department = 'admin';
                                // $department_id = '1';
                                // $_SESSION["member_id"] = 1;

                                // $department = 'หัวหน้าคณบดี';
                                $member_id = $_SESSION["member_id"];
                                // $_SESSION["member_id"] = 2;

                                // $department = 'รองคณบดีฝ่ายบริหาร';
                                // $department_id = '3';
                                // $_SESSION["member_id"] = 3;

                                //? Select FROM send_feedback  , member , departmen 
                                $result = "SELECT * FROM `send_feedback`
                                            inner JOIN member
                                            on member.member_id = send_feedback.member_receive_id
                                            INNER JOIN department
                                            ON member.department_id = department.department_id
                                            inner JOIN feedback
                                            ON send_feedback.feedback_id = feedback.feedback_id
                                            WHERE member_send_id = $member_id
                                            ORDER BY send_feedback_id DESC";

                                $query = mysqli_query($condb, $result);

                                $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                // echo "<pre>";
                                // print_R($rows);
                                // echo "</pre>";
                                // exit();

                                $count = 1;
                                foreach ($rows as $value) {

                                ?>

                                    <tr>
                                        <td style="width:5%"><?php echo $count++ ?></td>
                                        <?php
                                        
                                        $date = explode(" ",$value['date']);
                                        $dates = DateThai($date[0]);

                                        ?>
                                        <td ><?php echo $dates ?><br><?php echo $date[1] ?></td>

                                        <?php
                                        $member_receive_id = $value['member_receive_id'];
                                        $result2 = "SELECT * FROM member 
                                                    INNER JOIN department
                                                    ON department.department_id = member.department_id
                                                    WHERE member_id = $member_receive_id";

                                        $query2 = mysqli_query($condb, $result2);
                                        $rows2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                        foreach ($rows2 as $value2) {
                                            $color = '';
                                            if($value['level']=='boss'){
                                                $color = 'danger';
                                            } elseif($value['level']=='staff'){
                                                $color = 'warning';
                                            } elseif($value['level']=='employee'){
                                                $color = 'success';
                                            }
                                        ?>
                                            <td><?php echo $value2['name']?></td>
                                            <td><h5><span class="badge bg-<?php echo $color ?>"><?php echo $value['department_name'] ?></span><h5></td>
                                        <?php
                                        }
                                        ?>
                                        <!-- <td><a href="view_feedback.php?report_id=<?php echo $value['sf_sent_report_id'] ?>"><?php echo $value['header'] ?></a></td> -->
                                        <td><?php echo $value['header'] ?></td>

                                        <td style="width:10%" align="center"><a href="view_his_feedback.php?feedback_id=<?php echo $value['feedback_id'] ?>&member_send_name=<?php echo $value['name']  ?>&member_receive_id=<?php echo $value['member_receive_id'] ?>&sf_sent_report_id=<?php echo $value['sf_sent_report_id'] ?>"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a></td>
                                        <!-- <td align="center"><button><a href="#">Detail</a></button></td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>ส่งถึง</th>
                                    <th>แผนก</th>
                                    <th>หัวข้อ</th>
                                    <th>ดู</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <?php include("../include/footer.php"); ?>
    <?php include("../include/notification.php"); ?>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "paging": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

</body>