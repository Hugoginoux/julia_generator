import numpy as np, matplotlib.pyplot as plt, matplotlib, sys

nx, ny = 500, 500
itermax = 100
colormap = 'vert_2'
d=2

xmin,xmax,ymin,ymax=float(sys.argv[1]), float(sys.argv[2]), float(sys.argv[3]), float(sys.argv[4])
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

        
Z=np.full((nx,ny,3),(0,0,0), dtype=np.int32)
       
for i in range(nx):
    for j in range(ny):
        c=Z0[i,j]
        z=0
        for n in range(itermax):
            if np.abs(z)<=2:
                z=f(z,c)
            else:
                Z[i,j]=[255*i for i in color_dico[colormap](n)]
                break
        
          
Z=Z.astype(np.uint8)
print('ok')
        
image = plt.imshow(Z)
#plt.show()
    
matplotlib.image.imsave(r'C:\Users\hugo\Desktop\Programmes\Dev\julia_generator\image\mandelbrot\mandelbrot.jpg', Z)