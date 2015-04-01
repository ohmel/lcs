<div style="text-align: center; margin-bottom: 145px">
    <br/>
    <h1>Login here</h1>

    <div class="form" style="width: 300px; display: inline-block">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>
        <div class="">
            <div class="form-group">
                <?php echo $form->textField($model,'username', array('class' => 'username form-control', 'placeholder'=>'Username')); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>
            <div class="row">
                <?php echo $form->passwordField($model,'password', array('class' => 'username form-control', 'placeholder'=>'Password')); ?>
                <?php echo $form->error($model,'password'); ?>
            </div>

            <div class="row rememberMe">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->label($model,'rememberMe'); ?>
                <?php echo $form->error($model,'rememberMe'); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Log me in...', array('class'=>'btn btn-success')); ?>
            </div>
        </div>


        <?php $this->endWidget(); ?>
    </div><!-- form -->

</div>
