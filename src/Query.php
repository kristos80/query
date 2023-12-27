<?php
declare(strict_types=1);

namespace Kristos80\Query;

final class Query {

	/**
	 * @var array|null
	 */
	private static array|null $payload = NULL;

	/**
	 * @param string $key
	 * @param mixed|NULL $default
	 * @return mixed
	 */
	public static function get(string $key, mixed $default = NULL): mixed {
		return self::readFrom("get", $key, $default);
	}

	/**
	 * @param string $pool
	 * @param string $key
	 * @param mixed|NULL $default
	 * @return mixed
	 */
	private static function readFrom(string $pool, string $key, mixed $default = NULL): mixed {
		$pool_ = [];
		switch($pool) {
			case "get":
				$pool_ = $_GET;
			break;
			case "post":
				$pool_ = $_POST;
			break;
			case "payload":
				$pool_ = self::payload();
		}

		return ($pool_[$key] ?? $default) ?: $default;
	}

	/**
	 * @return array
	 */
	public static function payload(): array {
		if(self::$payload != NULL) {
			return self::$payload;
		}

		$payload = file_get_contents("php://input");
		$payload = json_decode($payload, TRUE);

		return self::$payload = $payload ?: [];
	}

	/**
	 * @param string $key
	 * @param mixed|NULL $default
	 * @return mixed
	 */
	public static function post(string $key, mixed $default = NULL): mixed {
		return self::readFrom("post", $key, $default);
	}

	/**
	 * @param string $key
	 * @param mixed|NULL $default
	 * @return mixed
	 */
	public static function readFromPayload(string $key, mixed $default = NULL): mixed {
		return self::readFrom("payload", $key, $default);
	}

}