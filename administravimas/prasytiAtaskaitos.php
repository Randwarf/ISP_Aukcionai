<head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>

    <form method='post' action='ataskaita.php'>
        <div>
            <input type='hidden' name='id' value=<?php echo $_GET['id'];?>></input>

            <label>Statymų vidurkis:</label>
            <input checked type='checkbox' name='vidurkis' value=1></input> <br>
            <label>Statymų pasiskirstymas laike:</label>
            <input checked type='checkbox' name='statymai' value=1></input> <br>
            <label>Komentarų pasiskirstymas laike:</label>
            <input checked type='checkbox' name='komentarai' value=1></input> <br>
            <label>Aktyviausias komentatorius:</label>
            <input checked type='checkbox' name='aktyviausias' value=1></input>
        </div>
        <div>
            <button type='submit'>Generuoti ataskaitą</button>
        </div>
    </form>
</body>