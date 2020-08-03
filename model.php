<?php

require_once 'db_connect.php';



function addTutor($data)       //Done
{
    $conn = db_conn();
    $selectQuery = "INSERT into dbtutor (Name, Password, Address, Email, Phone, Gender, Bangla, English, Chemistry, Physics, Math, Biology, Class1to5, Class6to8, Class9to10, SalaryStart ,SalaryEnd,ProfilePic, CV,Verified)
VALUES (:Name, :Password, :Address, :Email, :Phone, :Gender, :Bangla, :English, :Chemistry, :Physics, :Math, :Biology, :Class1to5, :Class6to8, :Class9to10, :SalaryStart, :SalaryEnd, :ProfilePic,:CV, :Verified)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Name' => $data['Name'],
            ':Password' => $data['Password'],
            ':Address' => $data['Address'],
            ':Email' => $data['Email'],
            ':Phone' => $data['Phone'],
            ':Gender' => $data['Gender'],
            ':Bangla' => $data['Bangla'],
            ':English' => $data['English'],
            ':Chemistry' => $data['Chemistry'],
            ':Physics' => $data['Physics'],
            ':Math' => $data['Math'],
            ':Biology' => $data['Biology'],
            ':Class1to5' => $data['Class1to5'],
            ':Class6to8' => $data['Class6to8'],
            ':Class9to10' => $data['Class9to10'],
            ':SalaryStart' => $data['SalaryStart'],
            ':SalaryEnd' => $data['SalaryEnd'],
            ':Verified' => $data['Verified'],
            ':ProfilePic' => $data['ProfilePic'],
            ':CV' => $data['CV']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn2 = db_conn();
    $selectQuery2 = "INSERT into login (Email, Password,Type) VALUES (:Email,  :Password, :Type)";
    try {
        $stmt = $conn2->prepare($selectQuery2);
        $stmt->execute([
            ':Email' => $data['Email'],
            ':Password' => $data['Password'],
            ':Type' => $data['Type']

        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    $conn2 = null;
    return true;
}

function showTutor($data)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM login where Email = ? and Password = ? and  Type = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Email'], $data['Password'], $data['Type']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
