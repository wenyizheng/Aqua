# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file '/home/xopowo/shower/msgbox.ui'
#
# Created by: PyQt5 UI code generator 5.5.1
#
# WARNING! All changes made in this file will be lost!

from PyQt5 import QtCore, QtGui, QtWidgets

class Ui_msg(object):
    def setupUi(self, msg):
        msg.setObjectName("msg")
        msg.resize(562, 168)
        msg.setStyleSheet("background-color:rgb(255, 255, 255)")
        msg.setInputMethodHints(QtCore.Qt.ImhNoAutoUppercase)
        msg.setSizeGripEnabled(True)
        self.msginfo = QtWidgets.QLabel(msg)
        self.msginfo.setGeometry(QtCore.QRect(130, 30, 311, 71))
        self.msginfo.setStyleSheet("font: 16pt \"Open Sans\";")
        self.msginfo.setInputMethodHints(QtCore.Qt.ImhNone)
        self.msginfo.setObjectName("msginfo")
        self.pushButton = QtWidgets.QPushButton(msg)
        self.pushButton.setGeometry(QtCore.QRect(230, 120, 85, 27))
        self.pushButton.setObjectName("pushButton")

        self.retranslateUi(msg)
        QtCore.QMetaObject.connectSlotsByName(msg)

    def retranslateUi(self, msg):
        _translate = QtCore.QCoreApplication.translate
        msg.setWindowTitle(_translate("msg", "Dialog"))
        self.msginfo.setText(_translate("msg", "TextLabel"))
        self.pushButton.setText(_translate("msg", "关闭"))


if __name__ == "__main__":
    import sys
    app = QtWidgets.QApplication(sys.argv)
    msg = QtWidgets.QDialog()
    ui = Ui_msg()
    ui.setupUi(msg)
    msg.show()
    sys.exit(app.exec_())

