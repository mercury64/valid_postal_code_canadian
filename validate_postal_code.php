/**
 * Validates a Canada Postal Code.
 *
 * @link http://
 *
 * @param $mValue
 * @param $sRegion
 *
 * @return  boolean
 *
 */
	public static function postal_code($m_value,  $s_region = '')
	{
		$m_value = strtolower($m_value);
		$s_first = substr($m_value, 0, 1);
		$s_region = strtolower($s_region);
		$a_region = array('nl' => 'a',
						'ns' => 'b',
						'pe' => 'c',
						'nb' => 'e',
						'qc' => array('g', 'h', 'j'),
						'on' => array('k', 'l', 'm', 'n', 'p'),
						'mb' => 'r',
						'sk' => 's',
						'ab' => 't',
						'bc' => 'v',
						'nt' => 'x',
						'nu' => 'x',
						'yt' => 'y');
		if (preg_match('/[abceghjlkmnprstvxy]/', $s_first)
			AND ! preg_match('/[dfioqu]/', $m_value)
			AND preg_match('/^\w\d\w[- ]?\d\w\d$/', $m_value) // This one fails on s7s700
			AND preg_match('/\b[ABCEGHJKLMNPRSTVXY][0-9][A-Z][- ]?[0-9][A-Z][0-9]\b/', strtoupper($m_value)))
		{
			if ( ! empty($s_region) AND array_key_exists($s_region, $a_region))
			{
				if (is_array($a_region[$s_region]) AND in_array($s_first, $aRegion[$s_region]))
				{
					return true;
				}
				elseif (is_string($a_region[$s_region]) AND $s_first == $a_region[$s_region])
				{
					return true;
				}
			}
			elseif (empty($s_region))
			{
				return true;
			}
		}
		return false;
	}
