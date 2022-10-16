<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Products Categories</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
        <?php
    
			$stmtcat =$con->prepare('SELECT * FROM categories');

			$stmtcat->execute();

			$catrows=$stmtcat->fetchAll();

			foreach ($catrows as $catrow) {
		?>
            <li><a href="categorie.php?catid=<?php echo $catrow['cat_id']; ?>"><?php echo $catrow['cat_title'];?></a></li>
        <?php }?>
            
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->


