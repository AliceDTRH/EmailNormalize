<?php
/**
 * Created by PhpStorm.
 * User: Alice
 * Date: 10/05/2020
 * Time: 20:42
 */

namespace AliceDTRH\EmailNormalizer;

/**
 * Class EmailNormalizer
 * @package AliceDTRH\EmailNormalizer
 */
class EmailNormalizer {

    /**
     *
     * @var array Information used to Normalize the emails from several domains/email providers.
     * @string stripchr => Characters that need to be removed, along with anything after it.
     * @boolean removedots => True if all dots should be removed
     * @string maindomain => Used if email accounts on multiple domains are sent to the same locations
     */
    static private $emailList = [
        //Google Mail
        'gmail.com' => ['stripchr' => '+','removedots' => True ,'maindomain' => 'gmail.com'],
        'googlemail.com' => ['stripchr' => '+','removedots' => True ,'maindomain' => 'gmail.com'],
        'google.com' => ['stripchr' => '+','removedots' => True ,'maindomain' => 'google.com'],
        //Hotmail
        'outlook.com' => ['stripchr' => '+','removedots' => False ,'maindomain' => 'google.com'],
    ];

    /**
     * @param String $email
     * @param array|null $emailList
     * @return String
     */
     public function normalizeEmail(String $email, array $emailList = null) : String {
        [$domain, $username] = self::extract_parts(strtolower($email));

        if($emailList == null) {
            $emailList = self::$emailList;
        }


        if (array_key_exists($domain, $emailList)) {
            if(!empty($emailList[$domain]['stripchr'])) {
                $username = explode($emailList[$domain]['stripchr'], $username)[0];
            }
            if($emailList[$domain]['removedots'] == True) {
                $username = str_replace('.', '', $username);
            }
        }
        return $username . '@' . $emailList[$domain]['maindomain'];
    }


    /**
     * @param String $email
     * @return array String[]
     */
    static private function extract_parts(String $email) : array
    {
        $parts = explode("@", $email);
        $domain = array_pop($parts);
        $username = implode("@",$parts);
        return [$domain, $username];
    }
}