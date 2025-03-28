# Coding partially generated by ChatGPT 4.0

import redis
import sys

# Connect to Redis
r = redis.Redis(host='localhost', port=6379, decode_responses=True)

users = {
    "user1": {"password": "password1", "email": "user1@mail.com"},
    "user2": {"password": "password2", "email": "user2@mail.com"}
}


# Example function to track user connections
def check_user_access_count(usr):
    key = f"user:{usr}:connections"
    count = r.get(key)

    if count is None:
        count = 0
    count = int(count)

    if count < 10:
        r.incr(key)
        r.expire(key, 600)  # Set expiration to 10 minutes
        return f"Access granted. {9 - count} connections left."
    else:
        return "Access denied. Too many requests in the last 10 minutes. Please try again later."


def check_user_credentials(usr, pwd):
    if user not in users or pwd != users[usr]["password"]:
        print("Wrong username or password.")
        return False
    return True


if len(sys.argv) >= 3:
    user = sys.argv[1]
    password = sys.argv[2]
    if check_user_credentials(user, password):
        print(check_user_access_count(user))

else:
    print("Please fill out all the fields")
