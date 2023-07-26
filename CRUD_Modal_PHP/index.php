<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <title>CRUD PHP </title>
</head>
<body>
   <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fas fa-user-secret"></i>Coding</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
</header>
<section class="container py-5">
    <div class="row">
        <div class="col-lg-8 col-sm mb-5 mx-auto">
            <h1 class="fs-4 text-center lead text-primary">CRUD PHP AJAX MYSQL</h1>
        </div>
    </div>
    <div class="dropdown-divider border-warning"></div>
    <div class="row">
        <div class="col-md-6">
            <h5 class="fw-bold mb-0">Liste de factures</h5>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-folder-plus">Nouveau</i></button>
                <a href="#" class="btn btn-success btn-sm" id='export'><i class="fas fa-table"></i>Exporter</a>
            </div>
        </div>
    </div>
    <br>
    <div class="dropdown-divider border-warning"></div>
    <div class="row">
    <div class="table-responsive" id="orderTable">
         <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Caissier</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Percu</th>
                    <th scope="col">Retourner</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<100;$i++): ?>
                <tr>
                    <th scope="row"><?=$i ?></th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <a href="#" class="text-info me-2 infoBtn" title="Voir plus"><i class="fas fa-info-circle"></i></a>
                        <a href="#" class="text-primary me-2 editBtn" title="Modifier"><i class="fas fa-edit"></i></a>
                        <a href="#" class="text-danger me-2 deleteBtn" title="Supprimer"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4 bg-cover" style="background-image: url(./Images/Me.jpg); min-height: 300px;"></div>
                            <div class="col-lg-8">
                                <form action="" class="row p-lg-5 gy-3" methode="post" id=formOrder>
                                    <div class="col-12">
                                        <h1 class="modal-title">Nouvelle facture</h1>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="customer" class="form-label">customer</label>
                                        <input type="text" class="form-control" id="customer" name="customer" placeholder="customer">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cashier" class="form-label">Cashier</label>
                                        <input type="text" class="form-control" id="cashier" name="cashier" placeholder="Cashier">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="amount" class="form-label"></label>
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="amount">
                                    </div>
                                    <div class="col-6">
                                        <label for="received" class="form-label">receive</label>
                                        <input name="received" id="received" class="form-control" placeholder="received">
                                    </div>
                                    
                                    <div class="col-6">
                                        <label for="state" class="form-label">state</label>
                                        <select name="state" id="state" class="form-select">
                                            <option value="Facturer">Facturer</option>
                                            <option value="Payer">Payer</option>
                                            <option value="Annuler">Annuler</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary" name="create" id="create">Ajouter <i class="fas fa-plus"></i> </button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


<script src="./js/jquery-3.5.0.min.js"></script>

<script src="./bootstrap-5.2.0-dist/css/bootstrap.min.js"></script>
<script src="./bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.2.0-dist/css/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="process.js"></script>
</body>
</html>