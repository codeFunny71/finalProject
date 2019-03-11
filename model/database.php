<?php


class Database
{
    public function connect()
    {
        try {
            require_once '/home/mabsherg/config.php';
            //Instantiate a database object
            $dbh = new PDO(DB_DSN, DB_USERNAME,
                DB_PASSWORD);
            //echo "Connected to database!!!";
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    public static function insertCustomer($newMem)
    {
        $newAdd = $newMem;

        global $dbh;
        //1. define the query
        $sql = "INSERT INTO Members (emailAddress, password, firstName, lastName, address, city, state, zipCode, phone, account)
            VALUES (:emailAddress, :password, :firstName, :lastName, :address, :city, :state, :zipCode, :phone, :account)";
       /* $sql = "INSERT INTO Members (fname, lname, age, gender, phone, email, state, seeking, bio, interests, premium)
            VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :interests, :premium)";*/
        //2. prepare the statement

        $statement = $dbh->prepare($sql);
        //3. bind parameters
        $statement->bindParam(':fname', $newAdd->getFirstName(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $newAdd->getLastName(), PDO::PARAM_STR);
        $statement->bindParam(':age', $newAdd->getAddress(), PDO::PARAM_STR);
        $statement->bindParam(':gender', $newAdd->getCity(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $newAdd->getState(), PDO::PARAM_STR);
        $statement->bindParam(':email', $newAdd->getZipCode(), PDO::PARAM_STR);
        $statement->bindParam(':state', $newAdd->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':seeking', $newAdd->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':bio', $newAdd->getPassword(), PDO::PARAM_STR);
        $statement->bindParam(':interests', $newAdd->getAccount(), PDO::PARAM_STR);


        //4. execute the statement
        $success = $statement->execute();
        //5. return the result
        return $success;
    }

    /**
     * @return array
     */
    public static function getCustomers()
    {
        global $dbh;
        //1. define the query
        $sql = "SELECT * FROM customers ORDER BY lastName";
        //2. prepare the statement
        $statement = $dbh->prepare($sql);
        //3. bind parameters

        //4. execute the statement
        $statement->execute();
        //5. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
//        if ($result[premium] == 1){
//            $admin = new PremiumMember($result[],$result[],$result[],$result[],$result[],);
//        }else{
//            $admin = new Member($result[],$result[],$result[],$result[],$result[],$result[]);
//        }

        return $result;
    }

    public static function getCustomerID($id)
    {

        global $dbh;
        //1. define the query
        $sql = "SELECT * FROM customers WHERE customerID=:id";
        //2. prepare the statement
        $statement = $dbh->prepare($sql);
        //3. bind parameters
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        //4. execute the statement
        $statement->execute();
        //5. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }


}