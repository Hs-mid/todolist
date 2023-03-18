<?php
    require_once('functions.php');
    connection()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class='container g-0 p-0'>
        <div class='content'>
            <div class='list mt-5'>
                <?php
                if(isset($_SESSION['insert'])){
                    echo $_SESSION['insert'];
                    unset ($_SESSION['insert']);
                }
                ?>
                <table class="table">
                    <thead>
                        <tr class='bg-dark'>
                            <th style="width: 70%;">todo</th>
                            <th>date</th>
                            <th >action</th>
                        </tr>
                    </thead>
                    <tbody class='table-content'>
                        <?php
                        $data=get_data();
                        
                            foreach($data as $item){
                                ?>
                                <tr>
                                    <td><?php echo $item['mission'] ?></td>
                                    <td><?php echo $item['date'] ?></td>
                                    <td><button class='btn btn-danger' onclick='remove(<?php echo $item["id"] ?>)'>delete</button></td>
                                </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <div class='inputs mt-4'>
                <div>
                    <input type='text' id='text'>
                    <input type='date' id='date'>
                </div>
                <button class='btn btn-primary' id='create'>create</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>