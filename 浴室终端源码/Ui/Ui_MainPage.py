# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file '/home/xopowo/shower/Homepage.ui'
#
# Created by: PyQt5 UI code generator 5.5.1
#
# WARNING! All changes made in this file will be lost!

from PyQt5 import QtCore, QtGui, QtWidgets

class Ui_MainPage(object):
    def setupUi(self, Homepage):
        Homepage.setObjectName("Homepage")
        Homepage.resize(1280, 800)
        Homepage.setCursor(QtGui.QCursor(QtCore.Qt.BlankCursor))
        palette1 = QtGui.QPalette()

        palette1.setBrush(self.backgroundRole(),QtGui.QBrush(QtGui.QPixmap('./img/278250.jpg')))  # 设置背景图片
        self.setPalette(palette1)
        self.setAutoFillBackground(True)  # 不设置也可以
        self.logo = QtWidgets.QLabel(Homepage)
        self.logo.setGeometry(QtCore.QRect(9, 19, 200, 80))
        self.logo.setMinimumSize(QtCore.QSize(200, 80))
        self.logo.setMaximumSize(QtCore.QSize(200, 60))
        self.logo.setStyleSheet("image:url(:/img/aqua.png)")
        self.logo.setText("")
        self.logo.setObjectName("logo")
        self.nowTimer = QtWidgets.QLabel(Homepage)
        self.nowTimer.setGeometry(QtCore.QRect(220, 50, 320, 45))
        self.nowTimer.setMinimumSize(QtCore.QSize(0, 45))
        self.nowTimer.setMaximumSize(QtCore.QSize(16777215, 80))
        self.nowTimer.setStyleSheet("font: 75 18pt \"Noto Serif Telugu\";\n"
"color:rgb(255, 0, 0)")
        self.nowTimer.setObjectName("nowTimer")
        self.horizontalLayoutWidget = QtWidgets.QWidget(Homepage)
        self.horizontalLayoutWidget.setGeometry(QtCore.QRect(30, 90, 1221, 681))
        self.horizontalLayoutWidget.setObjectName("horizontalLayoutWidget")
        self.horizontalLayout = QtWidgets.QHBoxLayout(self.horizontalLayoutWidget)
        self.horizontalLayout.setObjectName("horizontalLayout")
        self.textBrowser = QtWidgets.QTextBrowser(self.horizontalLayoutWidget)
        self.textBrowser.setStyleSheet("font: 22pt \"Noto Serif Thai\";\n"
"background-color:rgb(75, 162, 248);\n"
"color:#fff")
        self.textBrowser.setObjectName("textBrowser")
        self.horizontalLayout.addWidget(self.textBrowser)
        self.label = QtWidgets.QLabel(self.horizontalLayoutWidget)
        self.label.setMinimumSize(QtCore.QSize(10, 0))
        self.label.setMaximumSize(QtCore.QSize(13, 16777215))
        self.label.setText("")
        self.label.setObjectName("label")
        self.horizontalLayout.addWidget(self.label)
        self.gridLayout = QtWidgets.QGridLayout()
        self.gridLayout.setObjectName("gridLayout")
        self.label_3 = QtWidgets.QLabel(self.horizontalLayoutWidget)
        self.label_3.setMaximumSize(QtCore.QSize(16777215, 10))
        self.label_3.setText("")
        self.label_3.setObjectName("label_3")
        self.gridLayout.addWidget(self.label_3, 3, 0, 1, 1)
        self.label_2 = QtWidgets.QLabel(self.horizontalLayoutWidget)
        self.label_2.setMaximumSize(QtCore.QSize(16777215, 10))
        self.label_2.setText("")
        self.label_2.setObjectName("label_2")
        self.gridLayout.addWidget(self.label_2, 1, 0, 1, 1)
        self.label_4 = QtWidgets.QLabel(self.horizontalLayoutWidget)
        self.label_4.setMaximumSize(QtCore.QSize(16777215, 10))
        self.label_4.setText("")
        self.label_4.setObjectName("label_4")
        self.gridLayout.addWidget(self.label_4, 5, 0, 1, 1)
        self.use_help = QtWidgets.QPushButton(self.horizontalLayoutWidget)
        self.use_help.setMaximumSize(QtCore.QSize(16777215, 180))
        self.use_help.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
        icon = QtGui.QIcon()
        icon.addPixmap(QtGui.QPixmap("img/guizi_3.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
        self.use_help.setIcon(icon)
        self.use_help.setIconSize(QtCore.QSize(150, 150))
        self.use_help.setObjectName("use_help")
        self.gridLayout.addWidget(self.use_help, 4, 0, 1, 1)
        self.user_info = QtWidgets.QPushButton(self.horizontalLayoutWidget)
        self.user_info.setMaximumSize(QtCore.QSize(16777215, 180))
        self.user_info.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
        icon1 = QtGui.QIcon()
        icon1.addPixmap(QtGui.QPixmap("img/xianchang_3.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
        self.user_info.setIcon(icon1)
        self.user_info.setIconSize(QtCore.QSize(150, 150))
        self.user_info.setObjectName("user_info")
        self.gridLayout.addWidget(self.user_info, 2, 0, 1, 1)
        self.over_order = QtWidgets.QPushButton(self.horizontalLayoutWidget)
        self.over_order.setMinimumSize(QtCore.QSize(0, 0))
        self.over_order.setMaximumSize(QtCore.QSize(16777215, 160))
        self.over_order.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
        icon2 = QtGui.QIcon()
        icon2.addPixmap(QtGui.QPixmap("img/kaishi_3.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
        self.over_order.setIcon(icon2)
        self.over_order.setIconSize(QtCore.QSize(150, 150))
        self.over_order.setObjectName("over_order")
        self.gridLayout.addWidget(self.over_order, 0, 0, 1, 1)
        self.not_order = QtWidgets.QPushButton(self.horizontalLayoutWidget)
        self.not_order.setMaximumSize(QtCore.QSize(16777215, 180))
        self.not_order.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
        icon3 = QtGui.QIcon()
        icon3.addPixmap(QtGui.QPixmap("img/jieshu_3.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
        self.not_order.setIcon(icon3)
        self.not_order.setIconSize(QtCore.QSize(150, 150))
        self.not_order.setObjectName("not_order")
        self.gridLayout.addWidget(self.not_order, 6, 0, 1, 1)
        self.horizontalLayout.addLayout(self.gridLayout)

        self.retranslateUi(Homepage)
        QtCore.QMetaObject.connectSlotsByName(Homepage)

    def retranslateUi(self, Homepage):
        _translate = QtCore.QCoreApplication.translate
        Homepage.setWindowTitle(_translate("Homepage", "Form"))
        self.nowTimer.setText(_translate("Homepage", ""))
        self.textBrowser.setHtml(_translate("Homepage", "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0//EN\" \"http://www.w3.org/TR/REC-html40/strict.dtd\">\n"
"<html><head><meta name=\"qrichtext\" content=\"1\" /><style type=\"text/css\">\n"
"p, li { white-space: pre-wrap; }\n"
"</style></head><body style=\" font-family:\'Noto Serif Thai\'; font-size:22pt; font-weight:400; font-style:normal;\">\n"
"<p style=\" margin-top:0px; margin-bottom:0px; margin-left:0px; margin-right:0px; -qt-block-indent:0; text-indent:0px;\">waiting connect</p></body></html>"))
        self.use_help.setText(_translate("Homepage", "  打开柜子"))
        self.user_info.setText(_translate("Homepage", "  现场预约"))
        self.over_order.setText(_translate("Homepage", "  开始洗浴"))
        self.not_order.setText(_translate("Homepage", "  结束洗浴"))

import Ui.image_rc

if __name__ == "__main__":
    import sys
    app = QtWidgets.QApplication(sys.argv)
    Homepage = QtWidgets.QWidget()
    ui = Ui_Homepage()
    ui.setupUi(Homepage)
    Homepage.show()
    sys.exit(app.exec_())

