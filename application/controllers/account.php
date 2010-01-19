<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package    uwdata
 * @author     Jeff Verkoeyen
 * @copyright  (c) 2010 Jeff Verkoeyen
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
class Account_Controller extends Uwdata_Controller {

	const ALLOW_PRODUCTION = TRUE;

	public function validate($validation_key) {
	  if (!IN_PRODUCTION) {
		  $profiler = new Profiler;
		}

    // TODO: Figure out where to store magic constants.
    if ($validation_key && strlen($validation_key) == 32) {
      $db = Database::instance();
      $email_users_set = $db->
        select('email', 'is_validated')->
        from('email_users')->
        where('validation_key', $validation_key)->
        limit(1)->
        get();

      if (count($email_users_set)) {
        $email_user_row = null;
        foreach($email_users_set as $row) {
          $email_user_row = $row;
          break;
        }

        if (!$email_user_row->is_validated) {
          $db->
            from('email_users')->
            set('is_validated', '1')->
            set('validation_key', 'NULL', $disable_escaping = true)->
            where('email', $email_user_row->email)->
            update();
        }

    		$this->render_activation_succeeded_view(
    		  Kohana::lang('account_messages.activation.success'));

      } else {
    		$this->render_activation_failed_view(
    		  Kohana::lang('account_messages.activation.key_not_found'));
      }

    } else {
  		$this->render_activation_failed_view(
  		  Kohana::lang('account_messages.activation.key_not_found'));
    }
	}

  private function render_activation_failed_view($reason) {
		$content = new View('account_activation_failed');
		$content->reason = $reason;
		$this->template->title = 'Unable to activate account | uwdata.ca';

    $this->render_markdown_template($content);
  }

  private function render_activation_succeeded_view($reason) {
		$content = new View('account_activation_succeeded');
		$content->reason = $reason;
		$this->template->title = 'Your account is now active | uwdata.ca';

    $this->render_markdown_template($content);
  }

} // End Welcome Controller