<?php

    class REGIX{

        private $RG__name = '/^[a-zA-Z]\w{3,}+$/';
        private $RG_password ='/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
        private $RG_email ='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        private $RG_phone = '/^[0-9\-\(\)\/\+\s]*$/';
        private $RG_text = '/^[^<,\"@{}()*$%?=>:|;#]*$/';

        public function check($params)
        {
            $GLOBALS["arr_2"] = $params;
            $valide = true;

            foreach($params as $key => $value){
                if(!empty($value)){
                    if($key == "Lname" || $key == "Fname" || $key == "Lname")
                    {
                        if(!preg_match($this->RG__name , $value))
                        {
                            $valide = false;
                        }
                      
                    }
                    else if($key == "Email" || $key == "email")
                    {
                        if(!preg_match($this->RG_email , $value))
                        {
                            $valide = false;
                        }
                    }  
                    else if($key == "Password")
                    {
                        if(!preg_match($this->RG_password , $value))
                        {
                            $valide = false;
                        }
                    }   
                    else if($key == "PhoneNumber")
                    {
                        if(!preg_match($this->RG_phone  , $value))
                        {
                            $valide = false;
                        }
                    }  
                  else if($key == "subject" || $key == "message"|| $key == "reclamation" || $key == "sujet")
                    {
                        if(!preg_match($this->RG_text  , $value))
                        {
                            $valide = false;
                        }
                    }
                }
                else{
                    $valide = false;
                }
            }
            return $valide;

        }
    }
    