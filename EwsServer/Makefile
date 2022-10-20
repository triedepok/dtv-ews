# ========================================================================================
# Makefile for EWS SERVER (LINUX)
# Create by triedepok@gmail.com
#  ========================================================================================
# TARGET/Source definitions

SRCDIR = ./
TARGET1 = dews
TARGET2 = ewsplay
DESTDIR2 = /usr/local/bin/
DESTDIR1 = /usr/local/lib/
PROSES1 = $(DESTDIR1)$(TARGET1)
PROSES2 = $(DESTDIR2)$(TARGET2)

# ========================================================================================
install:
	install -m 755 $(TARGET1) $(DESTDIR1)
	install -m 755 $(TARGET2) $(DESTDIR2)

# ========================================================================================
# Clean all option

clean:
	rm -f $(PROSES1)
	rm -f $(PROSES2)


