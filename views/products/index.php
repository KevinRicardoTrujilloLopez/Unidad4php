<?php 

  include "../../app/config.php";
  
  include_once "../../app/ProductsController.php";

	$productsController = new ProductsController();

	$productos = array_reverse($productsController->get());

?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <?php include "../layouts/head.php" ?>
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    
    <!-- [ Pre-loader ] End --> 
    <?php include "../layouts/sidebar.php" ?> 
    <?php include "../layouts/navbar.php" ?>
    
    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                  <li class="breadcrumb-item" aria-current="page">Products</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Products</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- [ sample-page ] start -->
         
                          <div class="flex-grow-1 ms-3">
                            <div class="d-grid">
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
					  Añadir
						</button> 
                            </div>
                          </div>
  
						

						<?php if (isset($productos) && count($productos)): ?>
						<?php foreach ($productos as $product): ?> 
						
						<div class="col-3">
					

							<div class="card mb-3" style="width: 18rem;">
							  <img src="<?= $product->cover ?>" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h5 class="card-title">
							    	<?= $product->name ?>
							    </h5>
							    <p class="card-text">
							    	<?= $product->description ?>
							    </p>
							    <a href="product.php?slug=<?= $product->slug ?>" class="m-1 btn btn-primary">Go somewhere</a>

							   
 <a href="#" onclick="confirmDelete(<?= $product->id ?>)" class="m-1 btn btn-danger">
							    	Eliminar
							    </a>

							    <a onclick="editar(this)" data-product='<?= json_encode($product) ?>'  data-bs-toggle="modal" data-bs-target="#updateModal" class="m-1 btn btn-warning">
							    	Editar
							    </a>
							  </div>
							</div>

						</div>

						<?php endforeach ?>
						<?php endif ?>

					</div>
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
      </div>

    </div>
    
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">
	        	Añadir producto
	        </h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        
	        <form method="POST" action="../app/ProductsController.php">
			  
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">
			    	Nombre
			    </label>
			    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required> 
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">
			    	Slug
			    </label>
			    <input type="text" name="slug" class="form-control" id="exampleInputPassword1" required>
			  </div>

			  <div class="mb-3">
			    <label for="" class="form-label">
			    	Descripción
			    </label>
			    <textarea name="description" required class="form-control"></textarea>
			  </div>

			  <div class="mb-3">
			    <label for="" class="form-label">
			    	Features
			    </label>
			    <input type="text" name="features" required class="form-control" id="">
			  </div>
			   
			  <button type="submit" class="btn btn-primary">
			  	Crear producto
			  </button>

			  <input type="hidden" name="action" value="crear_producto">
			
			</form>
	      
	      </div>
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
	        	cancelar
	        </button> 
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">
	        	Añadir producto
	        </h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        
	        <form method="POST" action="../app/ProductsController.php">
			  
			  <div class="mb-3">
			    <label for="update_name" class="form-label">
			    	Nombre
			    </label>
			    <input type="text" name="name" class="form-control" id="update_name" aria-describedby="emailHelp" required> 
			  </div>
			  <div class="mb-3">
			    <label for="update_slug" class="form-label">
			    	Slug
			    </label>
			    <input type="text" name="slug" class="form-control" id="update_slug" required>
			  </div>

			  <div class="mb-3">
			    <label for="update_description" class="form-label">
			    	Descripción
			    </label>
			    <textarea name="description" required id="update_description" class="form-control"></textarea>
			  </div>

			  <div class="mb-3">
			    <label for="update_features" class="form-label">
			    	Features
			    </label>
			    <input type="text" name="features" required class="form-control" id="update_features">
			  </div>
			   
			  <button type="submit" class="btn btn-primary">
			  	Actualizar producto
			  </button>

			  <input type="hidden" name="action" value="update_producto">
			  <input type="hidden" name="product_id" value="" id="update_id_product">
			
			</form>
	      
	      </div>
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
	        	cancelar
	        </button> 
	      </div>
	    </div>
	  </div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script type="text/javascript">
		
		function editar(target)
		{

			let product = JSON.parse(target.dataset.product)

			console.log(product.name)

			document.getElementById("update_name").value = product.name
			document.getElementById("update_slug").value = product.slug
			document.getElementById("update_description").value = product.description
			document.getElementById("update_features").value = product.features
			document.getElementById("update_id_product").value = product.id
			
			
			
			
			
		}
		

	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function confirmDelete(id) {
        swal({
            title: "¿Estás seguro?",
            text: "¡No podrás recuperar este producto una vez eliminado!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                const formData = new FormData();
                formData.append('action', 'delete_producto');
                formData.append('product_id', id);

                fetch('../app/ProductsController.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    if (data.includes('ok')) {
                        swal("¡Producto eliminado!", {
                            icon: "success",
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        swal("Error al eliminar el producto. Intenta de nuevo.", {
                            icon: "error",
                        });
                    }
                })
                .catch(error => {
                    swal("Error de conexión. Intenta de nuevo.", {
                        icon: "error",
                    });
                });
            }
        });
    }
</script>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="productOffcanvas" aria-labelledby="productOffcanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="productOffcanvasLabel">Product Details</h5>
        <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
          <i class="ti ti-x f-20"></i>
        </a>
      </div>
      <div class="offcanvas-body">
        <div class="card product-card shadow-none border-0">
          <div class="card-img-top p-0">
            <a href="ecom_product-details.html">
              <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" alt="image" class="img-prod img-fluid" />
            </a>
            <div class="card-body position-absolute end-0 top-0">
              <div class="form-check prod-likes">
                <input type="checkbox" class="form-check-input" />
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-heart prod-likes-icon"
                >
                  <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"
                  ></path>
                </svg>
              </div>
            </div>
            <div class="card-body position-absolute start-0 top-0">
              <span class="badge bg-danger badge-prod-card">30%</span>
            </div>
          </div>
        </div>
        <h5>Glitter gold Mesh Walking Shoes</h5>
        <p class="text-muted"
          >Image Enlargement: After shooting, you can enlarge photographs of the objects for clear zoomed view. Change In Aspect Ratio:
          Boldly crop the subject and save it with a composition that has impact.</p
        >
        <ul class="list-group list-group-flush">
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Price</p>
              <h4 class="mb-0"><b>$299.00</b><span class="mx-2 f-14 text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
            </div>
          </li>
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Categories</p>
              <h6 class="mb-0">Shoes</h6>
            </div>
          </li>
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Status</p>
              <h6 class="mb-0"><span class="badge bg-warning rounded-pill">Process</span></h6>
            </div>
          </li>
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Brands</p>
              <h6 class="mb-0"><img src="<?= BASE_PATH ?>assets/images/application/img-prod-brand-1.png" alt="user-image" class="wid-40" /></h6>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    
    <?php include "../layouts/footer.php" ?> 

    <?php include "../layouts/scripts.php" ?> 

    <?php include "../layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->undefined
</html>