a, b, c = float(input('a = ') or 0), float(input('b = ') or 0), float(input('c = ') or 0)
delta = b**2 - 4*a*c
sqrtdelta = (abs(delta))**(1/2)

if (a == 0):
    kq = 'Nghiem duy nhat'
    x1 = -c / b
    x2 = x1
else:
    if (delta > 0):
        kq = 'Hai nghiem phan biet'
        x1 = (-b + sqrtdelta)/(2*a)
        x2 = (-b - sqrtdelta)/(2*a)
    elif (delta == 0):
        kq = 'Nghiem kep'
        x1 = -b/(2*a)
        x2 = x1
    else:
        kq = 'Nghiem phuc'
        R = -b/(2*a)
        i = sqrtdelta/(2*a)
        x1 = complex(R, i)
        x2 = complex(R, -i)

if (kq != '' and x1 and x2):
    print(kq)
    print('x1 = ', x1)
    print('x2 = ', x2)
