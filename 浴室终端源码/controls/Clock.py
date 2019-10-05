import datetime
import time
from threading import Thread


class Oclock(Thread):
    def __init__(self):
        Thread.__init__(self)
    def run(self):
        self.nowTime = datetime.datetime.now().strftime('%Y'+'年'+'-%b-%d'+'日'+' %H:%M:%S')

class CountDownTime(Thread):
    def __init__(self):
        Thread.__init__(self)
    def run(self):
        self.startTime = time.time()
        while True:
            time.sleep(1)
            now =time.time() - self.startTime
            print(int(now))
            if int(now) == 10:
                return False
        # time.sleep(60)

if __name__ == "__main__":
    a = CountDownTime()
    a.start()



