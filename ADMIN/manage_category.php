<?php include 'admin_header.php';?>

<body>
     <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>

            <br />

            <a href="#" class="btn-primary">ADD CATEGORY</a>

            <br />
            
            <table class="tbl-full">
                <tr>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <td>tsbpakpahan@gmail.com</td>
                    <td>Gilbert Pakpahan</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>

                <tr>
                    <td>tsbpakpahan@gmail.com</td>
                    <td>Gilbert Pakpahan</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>

                <tr>
                    <td>tsbpakpahan@gmail.com</td>
                    <td>Gilbert Pakpahan</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>

                
            </table>

        </div>
     </div>   

</body>

<?php include '../HTML/Footer.php'; ?>

<style>
    .tbl-full{
        width: 100%;
    }

    table tr th{
        border-bottom: 1px solid black;
        padding: 1%;
    }

    table tr td{
        padding: 1%;
        text-align: center;
    }

    .btn-primary{
        background-color: #079992;
        padding: 1%;
        margin-left: 20px;
        color: #fad390;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-primary:hover{
        background-color: #0c2461;
    }

    .btn-secondary{
        background-color: #78e08f;
        padding: 1%;
        margin-left: 20px;
        color:blue;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-secondary:hover{
        background-color: #b8e994;
    }

    .btn-danger{
        background-color: #eb2f06;
        padding: 1%;
        margin-left: 20px;
        color:white;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-danger:hover{
        background-color: #e55039;
    }
</style>