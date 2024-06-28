
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh Mục</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Number oder</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>Update Products</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $listdm = loadAll();
                    if(!isset($listdm)|| !is_array($listdm)){
                        $listdm = array();
                    } 
                    foreach($listdm as $dm): 
                ?>
                    <tr>
                        <td><?php echo $dm['ma_dm'] ?></td>
                        <td><?php echo $dm['ten_dm'] ?></td>
                        <td><img src="../upload2/<?php echo $dm['imgs'] ?>" alt="" width="70px" height="80px"></td>
                        <td><?php echo $dm['trang_thai'] ?></td>
                        <td><?php echo date('Y-m-d H:i:s', strtotime($dm['updateat'])); ?></td>
                        <td>
                            <a href="index.php?act=suadm&id=<?php echo $dm['ma_dm']; ?>">
                                <button class="btn">Sửa</button>
                            </a>
                            
                            <a href="index.php?act=xoadm&id=<?php echo $dm['ma_dm']; ?>">
                                <button class="btn" onclick="return confirm('Do you really want to delete this products')">Xóa</button>
                            </a>
                        </td>
                        
                    </tr>
                <?php endforeach ?>    
                </tbody>
                
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->