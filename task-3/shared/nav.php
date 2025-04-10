<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- home (database status) -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="http://localhost/instant-php/task-3/index.php">Home</a>
                </li>
                <!-- customers -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        customers
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/customers/add.php">add</a></li>
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/customers/list.php">list</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/customers/withoutorders.php">no orders list</a></li>
                    </ul>
                </li>
                <!-- orderes -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        orders
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/orders/add.php">add</a></li>
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/orders/list.php">list</a></li>
                    </ul>
                </li>
                <!-- products -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/products/add.php">add</a></li>
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/products/list.php">list</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="http://localhost/instant-php/task-3/data/products/notordered.php">not ordered list</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>