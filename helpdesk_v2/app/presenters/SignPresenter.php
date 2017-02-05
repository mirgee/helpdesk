<?php
use Nette\Application\UI\Form;

class SignPresenter extends BasePresenter
{
	protected function createComponentSignInForm()
	{
		$form = new Form;
		$form->addText('username', 'Uživatelské jméno:', 30, 20)
			->setRequired('Zadejte uživatelské jméno, prosím.', 30);

		$form->addPassword('password', 'Heslo:', 30)
			->setRequired('Zadejte heslo, prosím.');

		$form->addCheckbox('remember', 'Pamatovat si mě');

		$form->addSubmit('send', 'Přihlásit');

		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}


	public function signInFormSucceeded(Form $form)
	{
		$values = $form->getValues();
                $user = $this->getUser();

		if ($values->remember) {
			$user->setExpiration('14 days', FALSE);
		} else {
			$user->setExpiration('20 minutes', TRUE);
		}

		try {
			$user->login($values->username, $values->password);
			$this->redirect('Dashboard:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}
