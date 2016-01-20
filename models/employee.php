<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property string $id
 * @property integer $departmentId
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property integer $ext
 * @property string $hireDate
 * @property string $leaveDate
 *
 * @property Department $department
 */
class employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentId', 'firstName', 'lastName', 'email'], 'required'],
            [['departmentId', 'ext'], 'integer'],
            [['hireDate', 'leaveDate'], 'safe'],
            [['firstName'], 'string', 'max' => 20],
            [['lastName'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departmentId' => 'Department ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'ext' => 'Ext',
            'hireDate' => 'Hire Date',
            'leaveDate' => 'Leave Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'departmentId']);
    }
}
