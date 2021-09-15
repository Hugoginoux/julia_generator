#!/usr/bin/env python
print('ok')
import numpy as np
import matplotlib
matplotlib.use('agg')
import matplotlib.pyplot as plt
import sys
print('import ok')
#c=0.285 + 0.013j
#0.09-0.7j, 0.39-0.1j, 
#c=0.2+0.7j

real, imag, nx, ny, itermax, colormap, d = float(sys.argv[1]), float(sys.argv[2]), int(sys.argv[3]), int(sys.argv[3]), int(sys.argv[4]), sys.argv[5], float(sys.argv[6])

xmin,xmax,ymin,ymax=[-1.5,1.5,-1.5,1.5]
x=np.linspace(xmin,xmax,nx)
y=np.linspace(ymin,ymax,ny).reshape(-1,1)
Z0=x+1j*y
    
def f(z,c):
    fz=z**d+c
    return fz
    
def couleur_rose(n):
    r=n/itermax
    if r < 1/3 :
        return [0, 0, 3*r]
    elif r < 2/3 :
        return [r - 1, 0, 3*r - 1]
    else :
        return [3*r - 2, 0, 0]
       
def couleur_rose_2(n):
    r=n/itermax
    if r < 1/3 :
        if r < 1/12 :
            return [0 ,0, 12*r]
        elif r < 1/6 :
            return [12*r-1, 0, 12*r-1]
        elif r < 1/4 :
            return [12*r-2,0,0]
        return [0, 0, 12*r-3]
    elif r < 2/3 :
        return [3*r - 1, 0, 3*r - 1]
    else :
        return [3*r - 2, 0, 0]
   
def couleur_vert(n):
    r=n/itermax
    if r < 1/3 :
        return [0, 0, 3*r]
    elif r < 2/3 :
        return [0, 3*r - 1, 0]
    else :
        return [3*r - 2, 0, 0]
          
def couleur_vert_2(n):
    r=n/itermax
    if r < 1/3 :
        if r < 1/12 :
            return [0,0, 12*r]
        elif r < 1/6 :
            return [0, 12*r-1, 0]
        elif r < 1/4 :
            return [12*r-2,0,0]
        return [0, 0, 12*r-3]
    elif r < 2/3 :
        return [0, 3*r - 1, 0]
    else :
        return [3*r - 2, 0, 0]
        
color_dico={'vert' : couleur_vert, 'rose' : couleur_rose, 'vert_2' : couleur_vert_2, 'rose_2' : couleur_rose_2}

def fZ(c):
        
    Z=np.full((nx,ny,3),(0,0,0), dtype=np.int32)
       
    for i in range(nx):
        for j in range(ny):
            z=Z0[i,j]
            for n in range(itermax):
                if np.abs(z)<=2:
                    z=f(z,c)
                else:
                    Z[i,j]=[255*i for i in color_dico[colormap](n)]
                    break
        
    
    return Z
        
c = complex(real, imag)    
Z=fZ(c).astype(np.uint8)
print('ok')
        
image = plt.imshow(Z)
#plt.show()
    
matplotlib.image.imsave('image\julia.jpg', Z)