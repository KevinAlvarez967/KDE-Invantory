<?php
//Clase para validar todos los tipos de datos


    class validator
    {


            // Propiedades para manejar la validación de archivos de imagen.
        private $imageError = null;
        private $imageName = null;

        /*
        *   Método para obtener el nombre del archivo de la imagen validada previamente.
        */
        public function getImageName()
        {
            return $this->imageName;
        }

        /*
        *   Método para obtener el error al validar una imagen.
        */
        public function getImageError()
        {
            // Se compara el número del error para establecer un mensaje de error.
            switch ($this->imageError) {
                case 1:
                    $error = 'El tipo de la imagen debe ser gif, jpg o png';
                    break;
                case 2:
                    $error = 'La dimensión de la imagen es incorrecta';
                    break;
                case 3:
                    $error = 'El tamaño de la imagen debe ser menor a 2MB';
                    break;
                case 4:
                    $error = 'El archivo de la imagen no existe';
                    break;
                default:
                    $error = 'Ocurrió un problema con la imagen';
            }
            return $error;
        }




        public function validateForm($fields)
        {
            foreach ($fields as $index => $value) {
                $value = trim($value);
                $fields[$index] = $value;
            }
            return $fields;
        }




        //Metodo para validar un numero natural
        public function validateNaturalNumber($value)
        {
            if(filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1)))
            {
                return true;

            } 
            else
            {
                return false;
            }
        }


        public function validateImageFile($file, $maxWidth, $maxHeigth)
        {
            // Se verifica si el archivo existe, de lo contrario se establece un número de error.
            if ($file) {
                // Se comprueba si el archivo tiene un tamaño menor o igual a 2MB, de lo contrario se establece un número de error.
                if ($file['size'] <= 2097152) {
                    // Se obtienen las dimensiones de la imagen y su tipo.
                    list($width, $height, $type) = getimagesize($file['tmp_name']);
                    // Se verifica si la imagen cumple con las dimensiones máximas, de lo contrario se establece un número de error.
                    if ($width <= $maxWidth && $height <= $maxHeigth) {
                        // Se comprueba si el tipo de imagen es permitido (1 - GIF, 2 - JPG y 3 - PNG), de lo contrario se establece un número de error.
                        if ($type == 1 || $type == 2 || $type == 3) {
                            // Se obtiene la extensión del archivo.
                            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                            // Se establece un nombre único para el archivo.
                            $this->imageName = uniqid().'.'.$extension;
                            return true;
                        } else {
                            $this->imageError = 1;
                            return false;
                        }
                    } else {
                        $this->imageError = 2;
                        return false;
                    }
                 } else {
                    $this->imageError = 3;
                    return false;
                 }
            } else {
                $this->imageError = 4;
                return false;
            }
        }





        
        
        public function validateEmail($value)
        {
            if(filter_var($value, FILTER_VALIDATE_EMAIL))
            {
                return true;
            } else{
                return false;
            }
        }

        public function validateBoolean($value)
        {
            if($value == 1 || $value == 0 || $value == true  || $value == false )
            {
                return true;
            } else {
                return false;
            }
        }

        public function validateString($value, $minimum, $maximum)
        {
            if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\,\;\.\/]{'.$minimum.','.$maximum.'}$/', $value)) {
                return true;
            } else {
                return false;
            }
        }



        public function validateAlphabetic($value, $minimum, $maximum)
    {
        // Se verifica el contenido y la longitud de acuerdo con la base de datos.
        if (preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }





        public function validateAlphanumeric($value, $minimum, $maximum )
        {
            if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value)) {
                return true;
            } else {
                return false;
            }
        }


       



        public function validateMoney($value)
        {
            // Se verifica que el número tenga una parte entera y como máximo dos cifras decimales.
            if (preg_match('/^[0-9]+(?:\.[0-9]{1,2})?$/', $value)) {
                return true;
            } else {
                return false;
            }
        }




        public function validatePassword($value)
        {
            // Se verifica que la longitud de la contraseña sea de al menos 6 caracteres.
            if (strlen($value) >= 6) {
                return true;
            } else {
                return false;
            }
        }


        public function saveFile($file, $path, $name)
        {
            // Se verifica que el archivo exista.
            if ($file) {
                // Se comprueba que la ruta en el servidor exista.
                if (file_exists($path)) {
                    // Se verifica que el archivo sea movido al servidor.
                    if (move_uploaded_file ($file['tmp_name'], $path.$name)) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    
        /*
        *   Método para validar la ubicación de un archivo antes de borrarlo del servidor.
        *
        *   Parámetros: $path (ruta del archivo) y $name (nombre del archivo).
        *   
        *   Retorno: booleano (true si el archivo fue borrado del servidor o false en caso contrario).
        */
        public function deleteFile($path, $name)
        {
            // Se verifica que la ruta exista.
            if (file_exists($path)) {
                // Se comprueba que el archivo sea borrado del servidor.
                if (@unlink($path.$name)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        
    }





?>