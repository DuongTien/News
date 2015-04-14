<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

    var $virtualFields = array('name'=>"concat(first_name,' ',last_name)");

    var $validate = array (
        'birthdate' => array (
            'checkBirthdate' => array (
                'rule' => 'checkBirthdate',
                'message' => 'Birthdate is invalid',
                'allowEmpty' => true
            )
        )
    );

    function beforeSave($options = array())
    {
        parent::beforeSave($options);
        if (isset($this->data['User']['password']))
        {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
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

    function checkPhoto()
    {
        if ($this->data['User']['avatar_upload'] == UPLOAD_INVALID_TYPE)
        {
            $this->_validator['avatar_upload']['checkPhoto']->message = 'Invalid photo type';
            return false;
        }
        else if ($this->data['User']['avatar_upload'] == UPLOAD_INVALID_SIZE)
        {
            $this->_validator['avatar_upload']['checkPhoto']->message = 'Invalid photo size';
            return false;
        }
        else
        {
            if (!empty($this->data['User']['avatar_upload']))
            {
                // Delete old file
                @unlink(Configure::read('S.uploadDir.User') . $this->id . DS . $this->data['User']['avatar']);
                $this->data['User']['avatar'] = $this->data['User']['avatar_upload'];
            }

            return true;
        }
    }

    /**
     * validate confirm password
     * @return bool
     */
    public function checkConfirmPassword()
    {
        return ($this->data['User']['password'] === $this->data['User']['password_confirm']);
    }

    /**
     * validate old password
     * @return bool
     */
    public function checkOldPassword()
    {
        $check = false;

        $oldPassword = $this->data['User']['old_password'];
        $user = $this->find('first', array(
            'conditions' => array(
                'User.id' => AuthComponent::user('id'),
                'User.password' => AuthComponent::password($oldPassword)
            )
        ));
        if ($user) {
            $check = true;
        }
        return $check;
    }

    function checkBirthdate()
    {
        if($this->data['User']['birthdate'] > date('d-m-Y'))
        {
            return false;
        }
        return true;
    }
}
