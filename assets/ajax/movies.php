<?php
sleep(1);
// usleep(500000);

require '../../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM movies
            WHERE
          title LIKE '%$keyword%' OR
          genre LIKE '%$keyword%' OR
          actor LIKE '%$keyword%'
         ";
$movies = query($query);

?>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Poster</th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Actors</th>
            <th scope="colS">Synopsis</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php $i = 1;
        foreach ($movies as $mvs): ?>
            <tr>
                <th scope="row"><?= $i++; ?></td>
                <td><img src="../assets/img/<?= $mvs["poster"]; ?>" alt=""></td>
                <td><?= $mvs["title"]; ?></td>
                <td><?= $mvs["genre"]; ?></td>
                <td><?= $mvs["actor"]; ?></td>
                <td><?= $mvs["synopsis"]; ?></td>
                <td>
                    <a href="../interact/edit.php?id=<?= $mvs["id"]; ?>"
                        class="badge text-bg-warning text-decoration-none">Ubah</a>
                    <a href="../interact/delete.php?id=<?= $mvs["id"]; ?>" onclick="return confirm('Are you sure?');"
                        class="badge text-bg-danger text-decoration-none">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>