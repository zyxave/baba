#include<cmath>
#include<iostream>
using namespace std;
int main()
{
	short i,k,t,p,q,z,j;
	long x[27][27],y[27];
	cin>>t;
	for(i=1;i<=26;i++)
		{
			for(j=1;j<=i;j++)
				{
					if(j==1||j==i)
					{
						x[i][j]=1;
					}
					else
					{
						x[i][j]=x[i-1][j-1]+x[i-1][j];
					}
				}
		}
	
	for(k=0;k<t;k++)
	{
		cin>>p>>q;
		z=0;
		for(i=q;i>=0;i--)
			{
				y[i]=x[q+1][z+1]*pow(1,i)*pow(p,z);
				z+=1;
			}
		for(i=q;i>=0;i--)
			{
				if(i!=q)
				{
					cout<<y[i];
				}
				if(i>0)
				{
					cout<<"x";
				}
				if(i>1){
					cout<<i;
				}
				if(i>0)
				{
					cout<<" ";
				}
			}
			cout<<"\n";
	}
	return 0;
}
