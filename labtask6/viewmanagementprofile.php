<?php require_once("./inc/deps.php"); ?>
<?php header_section("Add Management"); ?>

<main class="clearfix">

    <?php

    $json_data = file_get_contents("db/managementdata.json");
    $json_data = json_decode($json_data);
    
    // var_dump($json_data);
    // echo $json_data[0][0]['name'];

    // foreach($json_data as $data)
    // {
    //     echo $data[0]->name;
    //     // echo '<pre>';
    //     // print_r($data[0]);
    //     // echo '</pre>';

    // }

    ?>
    

    <h1 class="main-title">Management List</h1>
    <table class="view-mngmnt">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date Of Birth</th>
            <th>NID</th>
            <th>Gender</th>
            <th>Location</th>
        </tr>
        <?php foreach($json_data as $data): ?>

        <tr>
            <td><?php echo $data[0]->name; ?></td>
            <td><?php echo $data[0]->email; ?></td>
            <td><?php echo $data[0]->dob; ?></td>
            <td><?php echo $data[0]->nid; ?></td>
            <td><?php echo $data[0]->gender; ?></td>
            <td><?php echo $data[0]->location; ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
</main>

<?php footer_section(); ?>