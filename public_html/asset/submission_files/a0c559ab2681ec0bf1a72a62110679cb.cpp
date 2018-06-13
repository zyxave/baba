#include<bits/stdc++.h>
using namespace std;
int t(int a)
{
	cout<<"Tes "<<a<<endl;
}
int main()
{
	t(1);
	bool lam[1000000];
	int n;
	int ku;
	int k;
	int i;
	int j;
	int ak[1000];//akumulasi
	//padam = false
	cin>>ku;
	t(2);
	for (i=1;i<=ku;i++)
	{
		t(3);
		ak[i]=0;
		cin>>n;
		for(j=0;j<=n-1;j++)
		{
			lam[j]=false;
		}
		t(4);
		for(j=0;j<=n-1;j++)//pemencetan saklar ke j
		{
			t(9);
			for(k=0;k<=n-1;k++)//perubahan padaa lampu ke k
			{
				t(10);
				if (j-(j/k)*k)
				{
					if (lam[k]==false){
						lam[k]=true;
					}
					else if (lam[k]==true)
					{
						lam[k]=false;
					}
				}
			}
		}
		t(5);
		for(j=0;j<=n-1;j++)
		{
			if (lam[j]==true)
			{
				ak[i]++;
			}
		}
		t(6);
	}
	t(7);
	for(i=1;i<=ku;i++)
	{
		cout<<ak[i]<<endl;
	}
	t(8);
}
