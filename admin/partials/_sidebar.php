  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-teal">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-teal">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link navbar-teal">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light fs-3">R M S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block fs-5">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item" id="dashboardMainMenu">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item" id="userMainMenu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-treeview">
              <li class="nav-item" id="createUserSubMenu">
                <a href="adduser.php" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item" id="manageUserSubMenu">
                <a href="manageusers.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
            </ul>
          <li class="nav-item" id="storesMainMenu">
            <a href="" class="nav-link">
              <i class="fas fa-store-alt nav-icon"></i>
              <p>Stores</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="createStoreSubMenu">
                <a href="addstore.php" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add Store</p>
                </a>
              </li>
              <li class="nav-item" id="manageStoreSubMenu">
                <a href="managestores.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Manage Stores</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="tableMainMenu">
            <a href="" class="nav-link">
              <i class="fas fa-tablets nav-icon"></i>
              <p>Tables</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="createTableSubMenu">
                <a href="addtable.php" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add Table</p>
                </a>
              </li>
              <li class="nav-item" id="manageTableSubMenu">
                <a href="managetables.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Manage Tables</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item" id="categoryMainMenu">
            <a href="" class="nav-link">
              <i class="fas fa-folder-minus nav-icon"></i>
              <p>Category</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" id="createCategorySubMenu">
              <li class="nav-item">
                <a href="addcategory.php" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item" id="manageCategorySubMenu">
                <a href="managecategories.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Manage Categories</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="productMainNav">
            <a href="" class="nav-link">
              <i class="fas fa-utensils nav-icon"></i>
              <p>Product</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="createProductSubMenu">
                <a href="addproduct.php" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item" id="manageProductSubMenu">
                <a href="manageproducts.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Manage Products</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="orderMainMenu">
            <a href="" class="nav-link">
            <i class="fas fa-calendar-minus nav-icon"></i>
              <p>Order</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="createOrderSubMenu">
                <a href="addorder.php" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add Order</p>
                </a>
              </li>
              <li class="nav-item" id="manageOrderSubMenu">
                <a href="manageorders.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Manage Orders</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="profileMainMenu">
            <a href="profile.php" class="nav-link">
            <i class="fas fa-id-badge nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item" id="groupMainMenu">
            <a href="" class="nav-link">
              <i class="fas fa-object-group nav-icon"></i>
              <p>Groups</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="createGroupSubMenu">
                <a href="addgroup.php" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add Group</p>
                </a>
              </li>
              <li class="nav-item" id="manageGroupSubMenu">
                <a href="managegroups.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Manage Groups</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="profileMainMenu">
            <a href="storeinfo.php" class="nav-link">
            <i class="fas fa-id-badge nav-icon"></i>
              <p>Store Info</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>