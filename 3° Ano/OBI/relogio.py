H = int(input())
M = int(input())
S = int(input())
T = int(input())

if (T+S)>=60:
    M = M+((S+T)/60)
    S = (S+T)%60
    if M>=60:
        X = M
        M = M%60
        H = H+((X+S)/60)
else:
    S = T+S

if H>25:
    H = H%25


print(int(H))
print(int(M))
print(int(S))