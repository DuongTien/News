<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

    var $virtualFields = array('name'=>"concat(first_name,' ',last_name)");

    var $validate = array();

    function beforeSave($options = array())
    {
        parent::beforeSave($options);
        if (isset($this->data['User']['password']))
        {
            $this->data['User']['password'] = Security::hash($this->data['User']['password'], 'sha1', true);
        }

        if(isset($this->data['User']['birthdate']))
        {
            $this->data['User']['birthdate'] = Tool::switchDate($this->data['User']['birthdate']);
        }

        return true;
    }

    function afterSave($created, $options = array())
    {
        parent::afterSave($created, $options);

        $id = $this->data['User']['id'];
        $photoPath = Configure::read('S.uploadDir.User') . $id . DS;

        /* ---------- Move main photo { ---------- */
        if ($created)
        {
            Tool::moveUploadFile($photoPath, $this->data['User']['avatar']);
        }
        /* ---------- Move main photo } ---------- */
    }
}
