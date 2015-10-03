<?php  include_once 'dbcon.php';
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getFeedbackTypes() {
   $result=pg_query_params("select * from techmatcher.feedbacktypelookup ORDER BY feedbacktype_id",array());
   $feedbacktypes=array();
   while ($name= pg_fetch_assoc($result)){
         $feedbacktypes[] = $name;
   }
   return $feedbacktypes;
}?>