<?php
                            if ($_POST['email']!="" && $_POST['name']!="" && $_POST['content']!=""){
			 				if ($_POST['name']!="" && $_POST['email']!="" && $_POST['content']!=""
							&&eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\.[a-z]{2,4}$",$_POST["email"])){
			 					
							
								$from = $_POST['email'];
								if ($from!='') {
									$mail = 'maximiliense@gmail.com'; 
									if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) //
									{
									        $passage_ligne = "\r\n";
									}
									else
									{
									        $passage_ligne = "\n";
									}
			
									$message_txt = $_POST['content'];
									$message_html = "<!DOCTYPE HTML<html><head></head><body>".$_POST['content']."</body></html>";
									//==========
									 
			
									 
									
									$boundary = "-----=".md5(rand());
									$boundary_alt = "-----=".md5(rand());
									//==========
									 
									
									$sujet = "Message From ".$_POST['name']." (~servajean)";
									//=========
									 
									
									$header = "From: \"".$_POST['name']."\"<".$_POST['email'].">".$passage_ligne;
									$header.= "Reply-to: \"".$_POST['name']."\"<".$_POST['email'].">".$passage_ligne;
									$header.= "MIME-Version: 1.0".$passage_ligne;
									$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
									//==========
									 
									
									$message = $passage_ligne."--".$boundary.$passage_ligne;
									$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
									$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
									//=====Ajout du message au format texte.
									$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
									$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
									$message.= $passage_ligne.$message_txt.$passage_ligne;
									//==========
									 
									$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
									 
									//=====Ajout du message au format HTML.
									$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
									$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
									$message.= $passage_ligne.$message_html.$passage_ligne;
									//==========
									 
									//=====On ferme la boundary alternative.
									$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
									//==========
									 
									 
									 
									$message.= $passage_ligne."--".$boundary.$passage_ligne;
									 
									
									mail($mail,$sujet,$message,$header);
								 
									echo "good";
								}
					
                            } else {
                                echo "error";
                            }
			 				 
                            } else {echo "error";}?>