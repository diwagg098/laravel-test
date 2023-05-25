<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 sidebar">
        <h1 class="text-light">Features</h1>
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="/">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/deposit">Deposit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/withdrawal">Withdrawal</a>
        </li>
        </ul>
    </div>
    <div class="col-md-9 main-content">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title text-center">My Account</h1>
                            <hr>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $data->name}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ $data->email}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Balance</label>
                                <input type="number" class="form-control" value="{{ $data->balance}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
