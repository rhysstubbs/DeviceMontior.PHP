import datetime
import errno
import sys
import socket
import os
import threading
import xml.etree.cElementTree as ET
from uuid import getnode

current_time = datetime.datetime.now()
HOSTNAME = 'rhysstubbs.tech'
PORT = 7864
BUFFER_SIZE = 2048

utf8 = "utf-8"
filename = "me.xml"
user_id = os.path.basename(__file__)


def check_os():

    if sys.platform.__contains__("win"):
        return 0
    elif sys.platform.__contains__("linux"):
        return 1
    else:
        return 99
osVersion = check_os()


def get_battery_percent(os):

    if os == 0:
        return
    elif os == 1:
        directory = "/sys/class/power_supply/BAT0/capacity"
        f = open(directory)
        percentage = f.read()
        f.close()
    return percentage


def get_mac():
    mac = getnode()
    h = iter(hex(mac)[2:].zfill(12))
    return ":".join(i + next(h) for i in h)


def generate_xml(name, encoding):

    root = ET.Element("device")
    root.set('id', str(user_id[:1]))
    root.set('fqdm', str(socket.getfqdn()))
    root.set('date', str(current_time))

    ET.SubElement(root, "ip").text = str(socket.gethostbyname(socket.gethostname()))
    ET.SubElement(root, "mac").text = str(get_mac())
    ET.SubElement(root, "battery").text = str(get_battery_percent(osVersion))

    tree = ET.ElementTree(root)
    tree.write(name, encoding=encoding, xml_declaration=True, method="xml")


def transmit(i, sock):
    try:
        sock.connect((HOSTNAME, PORT))  # CONNECT TO THE SOCKET
        data = sock.recv(BUFFER_SIZE)
        print("THE DATA RECEIVED = %s" % data.decode(utf8))

        while i:
            print("Sending...")
            sock.sendall(i)
            i = xml_file.read(BUFFER_SIZE)
    except socket.error as err:
        if err.errno == errno.EHOSTUNREACH:
            print("Host: %s Not Reachable" % HOSTNAME)
        sock.close()

generate_xml(filename, utf8)
xml_file = open(filename, "rb")
file_to_send = xml_file.read(BUFFER_SIZE)


def schedule():
    try:
        sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    except socket.error as err:
        print("Error creating socking - " + str(err))

    transmit(file_to_send, sock)

    threading.Timer(300, schedule).start()

schedule()
